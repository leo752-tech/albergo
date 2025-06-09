<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Mia Prima Pagina HTML</title>
    <style>
        /* Qui puoi aggiungere del codice CSS per lo stile */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #f4f4f4;
            color: #333;
        }
        h1 {
            color: #0056b3;
        }
        p {
            margin-bottom: 10px;
        }
        ul {
            list-style-type: disc;
            margin-left: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header>
        <h1>Benvenuto sulla Mia Pagina Web!</h1>
        <p>Questa è una semplice pagina HTML creata per dimostrazione.</p>
    </header>

    <hr>

    <main>
        <h2>Cos'è l'HTML?</h2>
        <p>
            L'**HTML** (HyperText Markup Language) è il linguaggio standard per la creazione di pagine web.
            Definisce la struttura e il contenuto di una pagina web utilizzando una serie di *tag*.
            Ogni tag ha un significato specifico e aiuta i browser a interpretare e visualizzare il contenuto correttamente.
        </p>

        <h3>Alcuni elementi HTML comuni:</h3>
        <ul>
            <li><code>&lt;p&gt;</code>: Per un paragrafo di testo.</li>
            <li><code>&lt;h1&gt;</code> a <code>&lt;h6&gt;</code>: Per i titoli di diverse dimensioni.</li>
            <li><code>&lt;a&gt;</code>: Per i link ipertestuali.</li>
            <li><code>&lt;img&gt;</code>: Per le immagini.</li>
            <li><code>&lt;ul&gt;</code> e <code>&lt;li&gt;</code>: Per le liste non ordinate.</li>
            <li><code>&lt;ol&gt;</code> e <code>&lt;li&gt;</code>: Per le liste ordinate.</li>
        </ul>

        <h3>Link Utili:</h3>
        <p>
            Per saperne di più sull'HTML, puoi visitare:
            <a href="https://www.w3schools.com/html/" target="_blank">W3Schools HTML Tutorial</a>.
        </p>

        <h3>Un piccolo esempio di codice:</h3>
        <pre><code>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Titolo&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;p&gt;Ciao Mondo!&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;
        </code></pre>
    </main>

    <hr>

    <footer>
        <p>&copy; 2025 La Mia Prima Pagina. Tutti i diritti riservati.</p>
    </footer>

</body>
</html>