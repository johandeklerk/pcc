## PC Array API filter test

### Setup

Clone this repo:

`git clone https://github.com/johandeklerk/pcc`

There are 2 directories, `api` and `client`

### API setup

docker-compose must be installed then:

Make sure you in the "api" directory:

`docker-compose up -d`

Assuming php, composer and npm/yarn is installed on your local system:

`composer install`

`cp .env.example .env`

`php artisan key:generate`

`npm install`

`npm run dev`

Otherwise run the commands from within the container

You can access the api at http://localhost:9000, feel free to edit docker-compose.yml to change the ports to your liking

### API Usage

Make an HTTP POST to http://localhost:9000/api/filter

Set the Content-Type: application/json header

Post JSON string:

`{"input": [1,3,5,8,15,17,25]}`

The API will return either an error message or a result eg:

`{
    "error": "Input array may not contain numbers bigger than 20"
}`

Or:

`{
    "result": "2,4,6-7,9-14,16,18-20"
}`

With CURL:

`curl -X POST -d "{\"input\": [1,3,5,8,15,17]}" -H "Content-type: application/json" http://localhost:9000/api/filter`

### UI

The react client is incomplete but you can build the image with:

`docker build . -t pcc/client`
