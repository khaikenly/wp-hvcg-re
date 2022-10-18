- install scoop

https://scoop.sh/

- install mkcert

`scoop bucket add extras`

`scoop install mkcert`

- Run

`mkdir /nginx/certs/`

`cd /nginx/certs/`

`mkcert wordpress-docker.test`

`docker-compose up -d --build`