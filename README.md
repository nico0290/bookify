### Install
You have to install docker [here](https://www.docker.com/products/docker).

it also requires `docker-compose`
```
brew install docker-compose
```

```
brew install ngrok
```

now you can install the project dependencies
```
cd YOUFOLDER && make install
```

### Start the webserver
```
make start
```


### Stop the webserver
```
make stop
```

### Run a distant server
```
ngrok http localhost:80
```
