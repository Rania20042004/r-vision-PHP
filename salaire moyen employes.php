<?php
// Définir un tableau associatif contenant des informations sur 5 employés
$employes = [
    [
        "nom" => "Alice Dupont",
        "poste" => "Développeur",
        "salaire" => 45000
    ],
    [
        "nom" => "Bob Martin",
        "poste" => "Designer",
        "salaire" => 40000
    ],
    [
        "nom" => "Charlie Durant",
        "poste" => "Chef de projet",
        "salaire" => 60000
    ],
    [
        "nom" => "Diana Leblanc",
        "poste" => "Analyste",
        "salaire" => 47000
    ],
    [
        "nom" => "Ethan Moreau",
        "poste" => "Testeur",
        "salaire" => 38000
    ]
];

// Fonction pour calculer la moyenne des salaires
function calculerSalaireMoyen($employes) {
    $totalSalaires = 0;
    foreach ($employes as $employe) {
        $totalSalaires += $employe['salaire'];
    }
    return $totalSalaires / count($employes);
}

// Calculer le salaire moyen
$salaireMoyen = calculerSalaireMoyen($employes);
echo $salaireMoyen;