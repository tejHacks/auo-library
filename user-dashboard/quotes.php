<?php
include('checklogin.php');   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Achievers University Library">
    <meta name="theme-color" content="#212529">
    <meta name="application-name" content="Achievers University Library">
    <meta name="description" content="A web application for connecting with Achievers University Library.">
    <title>AUO LIBRARY | QUOTES PAGE</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="icon" href="../assets/school.png" type="image/png">

    <!-- Scripts -->
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js" defer></script>

    <style>
        /* Scrollbar Styling */
        ::-webkit-scrollbar { background: #272727; width: 12px; }
        ::-webkit-scrollbar-thumb { background: #808080; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background-color: #666; }

        /* Quotes Styling */
        .content-box {
            border-radius: 10px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
            margin-bottom: 15px;
        }
        .content-box:hover {
            transform: translateY(-5px);
            background-color: #f1f1f1;
        }
        .quote-text { font-size: 18px; font-style: italic; }
        .quote-theme { font-size: 14px; color: #555; }
        .load-more-btn, .refresh-btn { background-color: #008CBA; color: white; border: none; padding: 10px 20px; cursor: pointer; margin: 10px; }
        .load-more-btn:hover, .refresh-btn:hover { background-color: #0079A1; }
    </style>
</head>

<body>
    <?php include("nav.php"); ?>

    <div class="container my-4">
        <p class="fade-in" style="font-size:18px;font-weight:400;">Hi, <?php echo htmlspecialchars($fullName); ?>!</p>
        <hr>

        <div id="quotesContainer">
            <!-- Quotes will be loaded here -->
        </div>
        
        <div class="text-center">
            <button id="loadMoreBtn" class="load-more-btn">Load More Quotes</button>
            <button id="refreshBtn" class="refresh-btn">Refresh Quotes</button>
        </div>
    </div>

    <script>
        // List of quotes
        const quotes = [
            { text: "Education is the most powerful weapon which you can use to change the world.", theme: "Education" },
            { text: "The only thing we have to fear is fear itself.", theme: "Fear" },
            { text: "Fear is the path to the dark side. Fear leads to anger, anger leads to hate, hate leads to suffering.", theme: "Fear" },
            { text: "Success is not final, failure is not fatal: It is the courage to continue that counts.", theme: "Success" },
            { text: "The greatest glory in living lies not in never falling, but in rising every time we fall.", theme: "Courage" },
            { text: "Your time is limited, don't waste it living someone else's life.", theme: "Success" },
            { text: "The way to get started is to quit talking and begin doing.", theme: "Success" },
            { text: "It does not matter how slowly you go as long as you do not stop.", theme: "Courage" },
            { text: "In the end, we will remember not the words of our enemies, but the silence of our friends.", theme: "Courage" },
            { text: "Success usually comes to those who are too busy to be looking for it.", theme: "Success" },
            { text: "The future belongs to those who believe in the beauty of their dreams.", theme: "Education" },
            { text: "What lies behind us and what lies before us are tiny matters compared to what lies within us.", theme: "Courage" },
            { text: "The only limit to our realization of tomorrow will be our doubts of today.", theme: "Fear" },
            { text: "The only person you are destined to become is the person you decide to be.", theme: "Success" },
            { text: "To be yourself in a world that is constantly trying to make you something else is the greatest accomplishment.", theme: "Courage" },
            { text: "I have not failed. I've just found 10,000 ways that won't work.", theme: "Success" },
            { text: "Change your thoughts and you change your world.", theme: "Education" },
            { text: "Opportunities don't happen. You create them.", theme: "Success" },
            { text: "Act as if what you do makes a difference. It does.", theme: "Education" },
            { text: "Believe you can and you're halfway there.", theme: "Courage" },
            { text: "Education is the key to unlock the golden door of freedom.", theme: "Education" },
            { text: "Success is the sum of small efforts, repeated day in and day out.", theme: "Success" },
            { text: "Success is walking from failure to failure with no loss of enthusiasm.", theme: "Success" },
            // Additional quotes for a total of 40
            { text: "To succeed in life, you need three things: a wishbone, a backbone, and a funny bone.", theme: "Success" },
            { text: "It is never too late to be what you might have been.", theme: "Courage" },
            { text: "Education is not preparation for life; education is life itself.", theme: "Education" },
            { text: "Courage is not the absence of fear, but rather the judgement that something else is more important than fear.", theme: "Courage" },
            { text: "The only way to do great work is to love what you do.", theme: "Success" },
            { text: "I can accept failure, everyone fails at something. But I can't accept not trying.", theme: "Success" },
            { text: "Do not wait to strike till the iron is hot, but make it hot by striking.", theme: "Success" },
            { text: "Success is not how high you have climbed, but how you make a positive difference to the world.", theme: "Success" },
            { text: "If you can dream it, you can achieve it.", theme: "Success" },
            { text: "Education is the passport to the future, for tomorrow belongs to those who prepare for it today.", theme: "Education" },
            { text: "The best way to predict your future is to create it.", theme: "Success" },
            { text: "Don't watch the clock; do what it does. Keep going.", theme: "Success" },
            { text: "Your life does not get better by chance, it gets better by change.", theme: "Courage" },
            { text: "Success is a journey, not a destination.", theme: "Success" },
            { text: "To live is the rarest thing in the world. Most people exist, that is all.", theme: "Courage" },
            { text: "The mind is everything. What you think you become.", theme: "Education" },
            { text: "The greatest wealth is to live content with little.", theme: "Success" },
            { text: "A person who never made a mistake never tried anything new.", theme: "Courage" },
            { text: "Education is not the filling of a pail, but the lighting of a fire.", theme: "Education" },
            { text: "Success is getting what you want. Happiness is wanting what you get.", theme: "Success" },
            { text: "Every day may not be good, but there's something good in every day.", theme: "Courage" },
            { text: "Success is about creating value.", theme: "Success" },
            { text: "Keep your face always toward the sunshine—and shadows will fall behind you.", theme: "Courage" },
            { text: "Success is how high you bounce when you hit bottom.", theme: "Success" },
            { text: "Courage is grace under pressure.", theme: "Courage" },
            { text: "The journey of a thousand miles begins with one step.", theme: "Education" },
            { text: "Success is the ability to go from one failure to another with no loss of enthusiasm.", theme: "Success" },
            { text: "Doubt kills more dreams than failure ever will.", theme: "Courage" },
            { text: "Success isn't just about what you accomplish in your life; it's about what you inspire others to do.", theme: "Success" },
            { text: "Education is a progressive discovery of our own ignorance.", theme: "Education" }
        ];

        let currentIndex = 0;
        const quotesPerLoad = 1; // Number of quotes to display on each load

        function loadQuotes() {
            const quotesContainer = document.getElementById('quotesContainer');
            let html = '';

            for (let i = 0; i < quotesPerLoad && currentIndex < quotes.length; i++, currentIndex++) {
                const quote = quotes[currentIndex];
                html += `
                    <div class="content-box">
                        <p class="quote-text">"${quote.text}"</p>
                        <p class="quote-theme">- ${quote.theme}</p>
                    </div>
                `;
            }

            quotesContainer.innerHTML += html;

            if (currentIndex >= quotes.length) {
                document.getElementById('loadMoreBtn').style.display = 'none'; // Hide button if no more quotes
            }
        }

        // Load initial quotes
        loadQuotes();

        // Load more quotes on button click
        document.getElementById('loadMoreBtn').addEventListener('click', loadQuotes);

        // Refresh quotes on button click
        document.getElementById('refreshBtn').addEventListener('click', () => {
            currentIndex = 0; // Reset current index
            document.getElementById('quotesContainer').innerHTML = ''; // Clear current quotes
            loadQuotes(); // Load quotes again
        });
    </script>
</body>
</html>
