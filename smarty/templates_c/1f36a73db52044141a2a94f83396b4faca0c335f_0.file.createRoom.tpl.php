<?php
/* Smarty version 4.3.2, created on 2025-06-17 16:41:13
  from 'C:\Users\momok\Documents\Programmazione_web\progetto\albergoPulito\smarty\templates\createRoom.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_68517e895daca8_10754561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f36a73db52044141a2a94f83396b4faca0c335f' => 
    array (
      0 => 'C:\\Users\\momok\\Documents\\Programmazione_web\\progetto\\albergoPulito\\smarty\\templates\\createRoom.tpl',
      1 => 1750166043,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68517e895daca8_10754561 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento Nuova Camera</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inserisci Dettagli Camera</h1>
        <form action="/~momok/Room/createRoom" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nomeCamera">Nome Camera:</label>
                <input type="text" id="nomeCamera" name="name" required>
            </div>

            <div class="form-group">
                <label for="numeroPosti">Numero di Posti:</label>
                <input type="number" id="numeroPosti" name="beds" min="1" required>
            </div>

            <div class="form-group">
                <label for="tipoCamera">Tipo:</label>
                <select id="tipoCamera" name="type" required>
                    <option value="">Seleziona un tipo</option>
                    <option value="Singola">Singola</option>
                    <option value="Doppia">Doppia</option>
                    <option value="Matrimoniale">Matrimoniale</option>
                    <option value="Tripla">Tripla</option>
                    <option value="Quadrupla">Quadrupla</option>
                    <option value="Suite">Suite</option>
                </select>
            </div>

            <div class="form-group">
                <label for="prezzo">Prezzo per Notte (€):</label>
                <input type="number" id="prezzo" name="price" step="0.01" min="0" required>
            </div>

            <div class="form-group">
                <label for="immaginiCamera">Immagini (puoi selezionarne più di una):</label>
                <input type="file" id="immaginiCamera" name="image[]" accept="image/*" multiple required>
            </div>

            <input type="submit" value="Inserisci Camera">
        </form>
    </div>
</body>
</html><?php }
}
