# Projet-7
# [![Codacy Badge](https://app.codacy.com/project/badge/Grade/8887c3dd35d34a6cb12bc94b43fbf85a)](https://www.codacy.com/gh/Yo13109/projet-7-ApiPlateforme/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Yo13109/projet-7-ApiPlateforme&amp;utm_campaign=Badge_Grade)

# Installation de l'application


 1.git clone https://github.com/Yo13109/projet-7-ApiPlateforme.git
 2. composer install
 3. configurer la connexion BDD sur le fichier .env fichier
 4. demarrer le serveur Php +  le dossier wamp 
 5. command -> symfony serve --port=3000
 6. creer une base de donnée -> symfony console doctrine:database:create
 7. Migrer la table sur la base de donnée -> symfony console doctrine:migration:migrate
 8. Vous pouvez charger les datas dans la base de données -> symfony console doctrine:fixtures:load
 9. lancez l'application

