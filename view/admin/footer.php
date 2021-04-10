<footer>

    <section class="container">

        <form action="." method="post">
        <input type="hidden" name="action" value="types">
        <button>View Types</button>
        </form>

        <form action="." method="post">
        <input type="hidden" name="action" value="class">
        <button>View Classes</button>
        </form>

        <form action="." method="post">
        <input type="hidden" name="action" value="makes">
        <button>View Makes</button>
        </form>

        <form action="." method="post">
        <input type="hidden" name="action" value="vehicles">
        <button>View Vehicles</button>
        </form>

        <form action="." method="post">
        <input type="hidden" name="action" value="show_register">
        <button>Register New Admin</button>
        </form>

        <form class="logout_button" action="." method="post">
            <input type="hidden" name="action" value="logout">
            <button>Logout</button>
        </form>

    </section>


    <div class="container">
        <p class="copyright">
            &copy; <?php echo date("Y"); ?> Zippy's Auto
        </p>
    </div>
</footer>
</body>
</html>