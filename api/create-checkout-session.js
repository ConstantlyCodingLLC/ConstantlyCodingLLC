
const stripe = require("stripe")("sk_test_51RijngPTjyig6Wj6uWSGG3jGtIonTeVGlsdQFSBDFtiPa3qnwuTfjjZ4Wf9Pva0Ac0xgjR1KCnBOzeRkoJbvnDRP00yl8l4TA5");

export default async function handler(req, res) {
  if (req.method === "POST") {
    try {
      const session = await stripe.checkout.sessions.create({
        payment_method_types: ["card"],
        line_items: [
          {
            price_data: {
              currency: "usd",
              product_data: {
                name: "Service Payment",
              },
              unit_amount: 2500,
            },
            quantity: 1,
          },
        ],
        mode: "payment",
        success_url: "https://constantly-coding-llc.vercel.app/success.html",
        cancel_url: "https://constantly-coding-llc.vercel.app/cancel.html",
      });

      res.status(200).json({ id: session.id });
    } catch (err) {
      res.status(500).json({ error: err.message });
    }
  } else {
    res.setHeader("Allow", "POST");
    res.status(405).end("Method Not Allowed");
  }
}
