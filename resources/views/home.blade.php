@extends('layouts.app')

@section('main')
    <div class="jumbotron text-center">
        <h1>Welcome to Warhammer Store!</h1>
        <p>Your Source for Warhammer Tabletop Games</p>
    </div>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-list">
            <div class="product">
                <img src="https://www.games-workshop.com/resources/catalog/product/600x620/60010199058_ENGWH40kStarterSet2.jpg"
                    alt="Product 1">
                <h3>Warhammer 40,000 Starter Set</h3>
                <p>Get started with the latest edition of Warhammer 40,000. The set includes miniatures, rulebook, and more.
                </p>
            </div>
            <div class="product">
                <img src="https://www.games-workshop.com/resources/catalog/product/600x620/60010299027_ExtremisLead.jpg"
                    alt="Product 2">
                <h3>Warhammer Age of Sigmar Starter Set</h3>
                <p>Embark on epic fantasy battles with the Age of Sigmar starter set. It includes miniatures and everything
                    you
                    need to play.</p>
            </div>
        </div>
    </section>

    <section class="categories">
        <h2>Product Categories</h2>
        <ul>
            <li>Figurines</li>
            <li>Paints & Accessories</li>
            <li>Gaming Boards</li>
            <li>Rulebooks</li>
            <li>Dice & Tokens</li>
        </ul>
    </section>

    <section class="about-us">
        <h2>About Us</h2>
        <p>Warhammer Store is your one-stop shop for all things Warhammer. We are passionate about tabletop gaming and
            provide a wide selection of products to meet your gaming needs.</p>
    </section>

    <section class="contact">
        <h2>Contact Us</h2>
        <p>If you have any questions or need assistance, please don't hesitate to reach out to us:</p>
        <p>Email: info@warhammerstore.com</p>
        <p>Phone: +123-456-7890</p>
    </section>
    </div>
@endsection
