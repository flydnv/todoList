<header>
    <nav>
        <div id="logo"><a href="?page=home"><h1>LOGO</h1></a></div>
        <ul>
            <li><a class="<?= $page==="home" ? "active" : "" ?>" href="?page=home">Home</a></li>
            <li><a class="<?= $page==="add" ? "active" : "" ?>" href="?page=add">Add todo</a></li>
        </ul>
    </nav>
</header>