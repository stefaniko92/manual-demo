# Manuel CASE 

## Installation

Follow these steps to set up the project environment.

### Prerequisites

- PHP ^8.2
- Composer
- A web server like Nginx or Apache
- MySQL or any compatible database server

### Clone the Repository

```bash
git clone git@github.com:stefaniko92/manual-demo.git
cd yourprojectname

composer install
cp .env.example .env
php artisan key:generate

Database export is on project root:
mysql -u username -p database_name < manual_demo.sql

php artisan migrate
php artisan db:seed
php artisan serve
The application will be available at http://localhost:8000.

Import postman collection from project root Manual CASE.postman_collection.json
```

### Usage

Login:
```
manual@example.com
Password1!
```


API Endpoints
List all the API endpoints with their methods, expected inputs, and outputs. For example:

```
GET /api/questionnaire - Fetches questionnaire details.

Output: List of questions and possible answers.

POST /api/questionnaire/answers - Submits questionnaire answers and returns product recommendations.

Input: JSON payload with users answers ids.
Output: List of recommended products or relevant messages.
```

### Testing

```
./vendor/bin/phpunit --filter QuestionnaireEvaluationTest
```
