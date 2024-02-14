<html lang="en">
</head>
<body>
    <section>
    <footer>
       <section class = " fcontainer">
            <div class="links">
                <h3>Useful Links</h3>
                <a href="information.php">Information</a>
                <a href="terms.php">Privacy Policy</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="views">
                <h3>Number Of Views</h3>
                <h3 id = "counter" >0</h3>
            </div>
            <div class="social">
                <h3>Follow Us</3>
                    <div class="icons">
                        <a class="fa fa-facebook" href="https://facebook.com" target="blank"></a>
                        <a class="fa fa-twitter" href="https://twitter.com" target="blank"></a>
                        <a class="fa fa-youtube" href="https://youtube.com" target="blank"></a>
                        <a class="fa fa-instagram" href="https://instagram.com" target="blank"></a>
                    </div>
            </div>
        </section>
        <section>
            <div class="copy">
                <h3>&copy;GWSC all rights reseved 2023</h3>
            </div>
        </section>
    </footer>
    <section>
</body>
</html>
</html>

<script>
    const countEl = document.getElementById('counter');

updateVisitCount();

function updateVisitCount(){
    fetch('https://api.countapi.xyz/update/gwsc/gwsccom/?amount=1')
    .then(res => res.json())
    .then(res => {
        countEl.innerHTML = res.value;
    });
}
</script>