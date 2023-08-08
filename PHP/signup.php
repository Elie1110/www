<?php
include('connection.php');

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire avec une validation de base
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $last_name = isset($_POST['last_name']) ? htmlspecialchars(trim($_POST['last_name'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Vérifier si tous les champs sont remplis
    if (empty($name) || empty($last_name) || empty($email) || empty($phone) || empty($password)) {
        echo "Veuillez remplir tous les champs du formulaire.";
    } else {
        // Vérifier si l'email existe déjà dans la base de données
        $emailExists = false;
        $sqlCheckEmail = "SELECT COUNT(*) as email_count FROM users WHERE email = ?";

        $stmtCheckEmail = $conn->prepare($sqlCheckEmail);
        $stmtCheckEmail->bind_param("s", $email);
        $stmtCheckEmail->execute();
        $result = $stmtCheckEmail->get_result();
        $row = $result->fetch_assoc();

        if ($row['email_count'] > 0) {
            $emailExists = true;
            echo "L'email existe déjà. Veuillez utiliser un autre email.";
        }

        // Si l'email n'existe pas, créer le compte
        if (!$emailExists) {
            // Hasher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Préparer la requête SQL avec des placeholders (?)
            $sql = "INSERT INTO users (first_name, last_name, email, pwd, phone_number) VALUES (?, ?, ?, ?, ?)";

            // Préparer la déclaration
            $stmt = $conn->prepare($sql);

            // Lier les valeurs aux placeholders
            $stmt->bind_param("sssss", $name, $last_name, $email, $hashedPassword, $phone);

            // Exécuter la requête préparée
            if ($stmt->execute()) {
                echo "Compte créé avec succès.";
            } else {
                echo "Une erreur est survenue lors du traitement de votre demande. Veuillez réessayer ultérieurement.";
            }

            // Fermer la déclaration
            $stmt->close();
        }

        // Fermer le résultat et la déclaration de la vérification d'email
        $result->close();
        $stmtCheckEmail->close();
    }
}

// Fermer la connexion
$conn->close();
?>