<style>
    * {
        margin: 0;
        padding: 0;
    }

    body {
        background-color: #F5F5F5;
        font-family: Arial, Helvetica, sans-serif;
    }

    .headerBody {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        background-color: #D4C825;
        color: white;
        padding: 20px;
        margin-bottom: 20px;
    }

    .nav {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 40px;
    }

    .liste {
        list-style: none;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .navLink {
        color: white;
        text-decoration: none;
        margin-left: 20px;
    }

    .navLink:hover {
        text-decoration: underline;
    }
</style>

<header class="headerBody">
    <div>
        <h1 class="title">YellowBird</h1>
    </div>
    <h2>Bonjour {{Auth::user()->name}}</h2>
    <nav class="nav">
        <ul class="liste">
            <li><a class="navLink" href="/locations">Locations</a></li>
            <li><a class="navLink" href="/routes">Routes</a></li>
        </ul>
    </nav>
</header>