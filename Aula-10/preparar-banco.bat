@echo off
setlocal
title Serenatto - Preparar banco

echo ==========================================
echo Preparando o banco de dados Serenatto
echo ==========================================
echo.

where mysql >nul 2>&1
if errorlevel 1 (
    echo ERRO: o comando mysql nao foi encontrado no PATH.
    echo Abra o terminal pelo Laragon ou adicione o MySQL ao PATH.
    pause
    exit /b 1
)

mysqladmin -u root ping >nul 2>&1
if errorlevel 1 (
    echo ERRO: o servidor MySQL nao esta iniciado.
    echo Abra o Laragon e clique em Start All. Depois execute este arquivo novamente.
    pause
    exit /b 1
)

echo Digite a senha do usuario root do MySQL.
echo Caso o root nao tenha senha, apenas pressione Enter.
echo.

mysql --default-character-set=utf8mb4 -u root -p < "%~dp0banco-serenatto.sql"

if errorlevel 1 (
    echo.
    echo Ocorreu um erro ao criar ou popular o banco.
    pause
    exit /b 1
)

echo.
echo Banco serenatto preparado com sucesso.
echo Os produtos existentes nao foram duplicados.
pause
