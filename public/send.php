<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "constantlycodingllc@gmail.com";
    $subject = "New App/Website Intake Form Submission";

    // Collect form data
    $business_name = $_POST['business_name'] ?? '';
    $contact_person = $_POST['contact_person'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $website = $_POST['website'] ?? '';
    $social_links = $_POST['social_links'] ?? '';
    $purpose = $_POST['purpose'] ?? '';
    $description = $_POST['description'] ?? '';
    $audience = $_POST['audience'] ?? '';
    $features = $_POST['features'] ?? '';
    $logo = $_POST['logo'] ?? '';
    $style = $_POST['style'] ?? '';
    $examples = $_POST['examples'] ?? '';
    $content = $_POST['content'] ?? '';
    $images = $_POST['images'] ?? '';
    $pages = $_POST['pages'] ?? '';
    $domain = $_POST['domain'] ?? '';
    $hosting = $_POST['hosting'] ?? '';
    $budget = $_POST['budget'] ?? '';
    $deadline = $_POST['deadline'] ?? '';
    $notes = $_POST['notes'] ?? '';

    // Build email message
    $message = "
    Business Name: $business_name
    Contact Person: $contact_person
    Email: $email
    Phone: $phone
    Website: $website
    Social Links: $social_links
    --------------------------------------
    Purpose: $purpose
    Business Description: $description
    Target Audience: $audience
    Features Needed: $features
    Logo/Branding: $logo
    Design Style: $style
    Inspiration: $examples
    Written Content Provided: $content
    Images Provided: $images
    Pages: $pages
    Domain: $domain
    Hosting: $hosting
    Budget: $budget
    Ideal Launch Date: $deadline
    Notes/Questions: $notes
    ";

    // Set headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your intake form was submitted.";
    } else {
        echo "Sorry, there was an error sending your form.";
    }
} else {
    echo "Invalid request.";
}
?>
