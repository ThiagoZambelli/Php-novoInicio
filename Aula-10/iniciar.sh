#!/bin/bash

echo "Iniciando MySQL..."
sudo service mysql start

echo "Iniciando servidor PHP..."
php8.3 -S localhost:8080