<div class="m-auto mt-32 text-center">
    <i class="fa-solid fa-dice text-8xl text-gray-100 "></i>
     <!--<h2 id="typing-text" class="text-xl text-gray-100 font-semibold mt-10">Coming soon</h2> -->
    <br>
    <span class="loading loading-ring mt-10 loading-lg text-white text-xl"></span>
</div>

<script>
    const typingTextElement = document.getElementById('typing-text');

    let textContent = 'Coming soon';


    const typingDelay = 400;

    function typeText() {
        typingTextElement.textContent = textContent;
        textContent += '.';

        if (textContent.length <= 14) {
            setTimeout(typeText, typingDelay);
        } else {
            setTimeout(resetText, typingDelay);
        }
    }

    function resetText() {
        typingTextElement.textContent = 'Coming soon';
        textContent = 'Coming soon';

        setTimeout(typeText, typingDelay);
    }

    setTimeout(typeText, typingDelay);
</script>
