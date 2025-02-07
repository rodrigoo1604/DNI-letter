## 🪪 DNI-Letter

This project consists of an API Rest where you send a package with a spanish valid id number and it returns it with its assigned letter.

## 👁️ API Peek 
This is the toll stations view:

![Captura_de_pantalla_2025-01-30_111203](https://github.com/user-attachments/assets/669686da-c7c4-432b-b640-5e5ad01e978b)


## 💻 Languages ​​and tools used  

Project coding:

![](https://skillicons.dev/icons?i=php,html,css)
![](https://skillicons.dev/icons?i=laravel,git,github,vscode,)


## ⚙️ Installation prerequisites

🟢Install [Node.js](https://nodejs.org/en/download/source-code)

🟢Install [Composer](https://getcomposer.org/download/)

## 🛞 Installation Guide 

-1: Before installing the project, you have to create a database, in my case i have used mysql with xampp as host.

-2: Open the terminal and paste this command:

`git clone https://github.com/rodrigoo1604/Toll.git`

⚠️ Be careful, you have to be in the folder you want this project cloned at!

-3: After you have cloned the repository, rename the file `.env.example` to `.env` and adjust the database configuration to yours.


-4: Last but not least, open three terminals in bash and execute the following commands

▷Console 1:
    `npm install` and after `npm run dev`
    
▷Console 2:
    `composer install` and after `php artisan serve`
    
▷Console 3: 
    `php artisan migrate:fresh --seed`
    
-And that should be it, just open the browser and insert the url the server has provided you

⚠️ If you have done the previous steps and something has gone wrong please go back to the third command console and insert this:

`php artisan key:generate` and after `php artisan config:cache` 

## 🌐 Endpoint
The endpoint is very easy, you only need to send the package json like this:
`{"dni" : "{DNI number}"}`

And the endpoint is the following:

`/api/calculate-dni-letter`

## 🧑‍🔬 Tests 
All tests have passed ;) , insert `php artisan test --coverage` or `php artisan test --coverage-html=coverage-report` in the console to check them

![Captura_de_pantalla_2025-01-30_095503](https://github.com/user-attachments/assets/72f5ee24-276f-4ebe-9236-6e50380c5ee2)


## 🙍‍♂️ About me 
Hello, i am a student in a backend and AWS bootcamp.
- [Github Profile](https://github.com/rodrigoo1604)
