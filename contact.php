<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // Validation des données
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Le nom est requis.";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Une adresse email valide est requise.";
    }
    
    if (empty($message)) {
        $errors[] = "Le message ne peut pas être vide.";
    }
    
    // Traitement si aucune erreur
    if (empty($errors)) {
        // Configuration de l'email
        $to = "contact@bionikayiti.com";
        $subject = "Nouveau message de $name - BIONIK AYITI";
        $body = "Nom: $name\n";
        $body .= "Email: $email\n\n";
        $body .= "Message:\n$message";
        $headers = "From: $email";
        
        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            $response = [
                'success' => true,
                'message' => 'Votre message a été envoyé avec succès!'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'envoi du message.'
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => 'Veuillez corriger les erreurs suivantes:',
            'errors' => $errors
        ];
    }
    
    // Retour de la réponse en JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>