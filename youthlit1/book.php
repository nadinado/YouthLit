
<?php include 'header.php'; ?>

<!-- ***** Book Descriptions Start ***** -->
<section class="section colored" id="book">
    <div class="container">
        <!-- ***** Section Title Start ***** -->
        <div class="row">
            <div class="col-lg-12">
                <div class="center-heading">
                    <br><br><h2 class="section-title">Book Discovery</h2>
                </div>
            </div>
            <div class="offset-lg-3 col-lg-6">
                <div class="center-text">
                    <p>Explore, uncover, and connect with stories, this is your gateway to discovering books you'll love.</p>
                </div>
            </div>
        </div>
        <!-- ***** Section Title End ***** -->

        <!-- ***** Genre Filter Dropdown Start ***** -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <select id="genre-filter" class="main-button" 
            style="
                padding: 10px 15px;
                border-radius: 25px;
                border: 2px solid #ddd;
                font-size: 16px;
                color: #333;
                background-color: #f9f9f9;
                cursor: pointer;
                transition: all 0.3s ease;
            "
        >

                    <option value="All">All Genres</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Romance">Romance</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Dystopian">Dystopian</option>
                    <option value="Literary Fiction">Literary Fiction</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Historical Fiction">Historical Fiction</option>
                    <option value="Contemporary Fiction">Contemporary Fiction</option>
                </select>
            </div>
        </div><br><br><br>
        <!-- ***** Genre Filter Dropdown End ***** -->

        <div class="row" id="book-list">
            <!-- ***** Book Items Start ***** -->
            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Fantasy,Adventure">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/harrypotter.png" alt="Harry Potter" style="width: 150px; height: 210px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">Harry Potter and the Philosopher’s Stone</a>
                            <br><a href="https://en.wikipedia.org/wiki/J._K._Rowling">J.K. Rowling</a>
                        </h3>
                        <div class="text">
                            The first book in the iconic Harry Potter series, it introduces readers to the magical world of Hogwarts.
                        </div>
                        
                        <a href="https://www.goodreads.com/book/show/42844155-harry-potter-and-the-sorcerer-s-stone" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
                         <input type="hidden" name="book_id" value="1"> <!-- Replace 1 with the actual book id -->
                         <button type="submit" class="main-button">Add to Favorites</button>
                        </form>
                    <br><br>
                    </div>
                </div>
            </div>
            <!-- Repeat similar blocks for other books, updating data-genre -->
            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Dystopian,Adventure">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/hungergame.png" alt="The Hunger Games" style="width: 150px; height: 210px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">The Hunger Games</a>
                            <br><a href="https://en.wikipedia.org/wiki/Suzanne_Collins">Suzanne Collins</a>
                        </h3>
                        <div class="text">
                            A gripping story of survival in a dystopian world where a televised death match unfolds.
                        </div>
                        <a href="https://www.goodreads.com/book/show/2767052-the-hunger-games" class="main-button"style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
                        <input type="hidden" name="book_id" value="2"> <!-- Replace 1 with the actual book id -->
                         <button type="submit" class="main-button">Add to Favorites</button>
                        </form>
            <br><br>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Fantasy,Adventure">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/percyjackson.png" alt="" style="width: 150px; height: 210px;">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <!-- ***** Fantasy/Adventure ***** -->
                                <a href="#">Percy Jackson & the Olympians</a>
                                <br><a href="https://en.wikipedia.org/wiki/Rick_Riordan">Rick Riordan</a>
                            </h3>
                            <div class="text">  
                            Percy sets out to retrieve Zeus's stolen lightning bolt and avert a divine war.
                            </div>
                            <a href="https://www.goodreads.com/book/show/123675190-the-lightning-thief" class="main-button" style="margin: 10px 0;">Read More</a>
                            <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="3"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                        </div>
                    </div>
                </div>
            
                <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Adventure,Fantasy">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/children-of-blood-and-bone.png" alt="" style="width: 150px; height: 195px;">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <!-- ***** Fantasy/Adventure ***** -->
                                <a href="#">Children of Blood and Bone</a>
                                <br><a href="https://en.wikipedia.org/wiki/Tomi_Adeyemi">Tomi Adeyemi</a>
                            </h3>
                            <div class="text">
                            A West African-inspired fantasy with magic, rebellion, and danger.
                            </div>
                            <a href="https://www.goodreads.com/book/show/34728667-children-of-blood-and-bone" class="main-button" style="margin: 10px 0;">Read More</a>
                            <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="4"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Contemporary Fiction,Romance">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/thefaultinourstars.png" alt="" style="width: 150px; height: 195px;">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <!-- ***** Contemporary Fiction, Romance ***** -->
                                <a href="#">The Fault in Our Stars</a>
                                <br><a href="https://en.wikipedia.org/wiki/John_Green">John Green</a>
                            </h3>
                            <div class="text">
                            A heartfelt story of two teenagers dealing with love and terminal illness.
                            </div>
                            <a href="https://www.goodreads.com/book/show/11870085-the-fault-in-our-stars" class="main-button" style="margin: 10px 0;">Read More</a>
                            <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="5"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Fantasy,Adventure">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/thenightcircus.png" alt="" style="width: 150px; height: 195px;">
                        </div>
                        <div class="blog-content">
                            <h3>
                                 <!-- ***** Fantasy, Adventure ***** -->
                                 <a href="#">The Night Circus</a>
                                <br><a href="https://en.wikipedia.org/wiki/Erin_Morgenstern">Erin Morgensten</a>
                            </h3>
                            <div class="text">
                            A magical competition between two young illusionists in an enchanting circus.
                            </div>
                            <a href="https://www.goodreads.com/book/show/9361589-the-night-circus" class="main-button" style="margin: 10px 0;">Read More</a>
                            <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="6"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                        </div>
                    </div>
                </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Fantasy,Romance">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/red-queen.png" alt="" style="width: 150px; height: 200px;">
                        </div>
                        <div class="blog-content">
                            <h3>
                               <!-- ***** Science Fiction, Dystopian ***** -->
                               <a href="#">Red Queen</a>
                                <br><a href="https://en.wikipedia.org/wiki/Victoria_Aveyard">Victoria Aveyard</a>
                            </h3>
                            <div class="text">
                            A world divided by blood—commoners with red blood and elites with silver.
                            </div>
                            <a href="https://www.goodreads.com/book/show/22328546-red-queen" class="main-button" style="margin: 10px 0;">Read More</a>
                            <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="7"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Historical Fiction">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/salttothesea.png" alt="" style="width: 145px; height: 200px;">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <!-- ***** Historical Fiction ***** -->
                               <a href="#">Salt to the Sea</a>
                                <br><a href="https://en.wikipedia.org/wiki/Ruta_Sepetys">Ruta Sepetys</a>
                            </h3>
                            <div class="text">
                            A WWII-era novel that follows refugees on a doomed ship trying to escape war-torn Europe.
                            </div>
                            <a href="https://www.goodreads.com/book/show/25614492-salt-to-the-sea" class="main-button" style="margin: 10px 0;">Read More</a>
                            <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="8"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Literary Fiction">
                    <div class="blog-post-thumb">
                        <div class="img">
                            <img src="assets/images/tbdate.png" alt="" style="width: 150px; height: 195px;">
                        </div>
                        <div class="blog-content">
                            <h3>
                                <!-- ***** Literary Fiction***** -->
                               <a href="#">They Both Die at the End</a>
                                <br><a href="https://en.wikipedia.org/wiki/Adam_Silvera">Adam Silvera</a>
                            </h3>
                            <div class="text">
                            A poignant tale of two strangers who meet on the last day of their lives.
                            </div>
                            <a href="https://www.goodreads.com/book/show/33385229-they-both-die-at-the-end" class="main-button" style="margin: 10px 0;">Read More</a>
                            <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="9"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Dystopian,Adventure">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/tmrunner.png" alt="" style="width: 150px; height: 200px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">The Maze Runner</a>
                            <br><a href="https://en.wikipedia.org/wiki/James_Dashner">James Dashner</a>
                        </h3>
                        <div class="text">
                       Teens are trapped in a maze, fighting for survival and uncovering its secrets.
                        </div>
                        <a href="https://www.goodreads.com/book/show/6186357-the-maze-runner" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="10"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Romance,Contemporary Fiction">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/toallboys.png" alt="" style="width: 150px; height: 210px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">To All the Boys I've Loved Before</a>
                            <br><a href="https://en.wikipedia.org/wiki/Jenny_Han">Jenny Han</a>
                        </h3>
                        <div class="text">
                        A teen's secret love letters are sent out, sparking unexpected romances.
                        </div>
                        <a href="https://www.goodreads.com/book/show/15749186-to-all-the-boys-i-ve-loved-before" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="11"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Science Fiction,Adventure">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/readypl1.png" alt="" style="width: 150px; height: 210px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">Ready Player One</a>
                            <br><a href="https://en.wikipedia.org/wiki/Ernest_Cline">Ernest Cline</a>
                        </h3>
                        <div class="text">
                        In a dystopian future, a teenager embarks on a quest through a virtual reality world to find a hidden fortune.
                        </div>
                        <a href="https://www.goodreads.com/book/show/9969571-ready-player-one" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="12"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Mystery,Historical Fiction">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/secretgarden.png" alt="" style="width: 145px; height: 200px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">The Secret Garden</a>
                            <br><a href="https://en.wikipedia.org/wiki/Frances_Hodgson_Burnett">Frances Hodgson Burnett</a>
                        </h3>
                        <div class="text">
                        A girl uncovers a hidden garden in her uncle’s mansion, leading to mysterious and life-changing events for her and her family.
                        </div>
                        <a href="https://www.goodreads.com/book/show/2998.The_Secret_Garden" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="13"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Mystery,Historical Fiction">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/girlpearlearing.png" alt="" style="width: 145px; height: 200px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">The Girl with the Pearl Earring</a>
                            <br><a href="https://en.wikipedia.org/wiki/Tracy_Chevalier">Tracy Chevalier</a>
                        </h3>
                        <div class="text">
                        A young girl becomes the muse for the famous painter Vermeer, but her life takes a mysterious turn as she becomes embroiled in secrets.
                        </div>
                        <a href="https://www.goodreads.com/book/show/2865.Girl_with_a_Pearl_Earring" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="14"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Historical Fiction,Romance">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/the-song-of-achilles.png" alt="" style="width: 150px; height: 200px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">The Song of Achilles</a>
                            <br><a href="https://en.wikipedia.org/wiki/Madeline_Miller">Madeline Miller</a>
                        </h3>
                        <div class="text">
                        A retelling of the Trojan War from Patroclus's perspective, exploring his deep, tragic romance with Achilles.
                        </div>
                        <a href="https://www.goodreads.com/book/show/13623848-the-song-of-achilles" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="15"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Thriller,Romance">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/the-girl-on-the-train.png" alt="" style="width: 150px; height: 200px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">The Girl on the Train</a>
                            <br><a href="https://en.wikipedia.org/wiki/Paula_Hawkins_(author)">Paula Hawkins</a>
                        </h3>
                        <div class="text">
                        Rachel, an alcoholic, gets caught in the mystery of a missing woman, while her complicated relationships add romantic tension to the suspense.
                        </div>
                        <a href="https://www.goodreads.com/book/show/22557272-the-girl-on-the-train" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="16"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Thriller,Science Fiction">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/ender-s-game.png" alt="" style="width: 150px; height: 200px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">Ender's Game</a>
                            <br><a href="https://en.wikipedia.org/wiki/Orson_Scott_Card">Orson Scott Card</a>
                        </h3>
                        <div class="text">
                        Ender Wiggin, a young genius, is trained at a military school to defend Earth from an alien invasion, blending strategy, psychology, and sci-fi thrills.
                        </div>
                        <a href="https://www.goodreads.com/book/show/375802.Ender_s_Game" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="17"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 book-item" data-genre="Science Fiction,Thriller">
                <div class="blog-post-thumb">
                    <div class="img">
                        <img src="assets/images/scythe.png" alt="" style="width: 150px; height: 200px;">
                    </div>
                    <div class="blog-content">
                        <h3>
                            <a href="#">Scythe</a>
                            <br><a href="https://en.wikipedia.org/wiki/Neal_Shusterman">Neal Shusterman</a>
                        </h3>
                        <div class="text">
                        In a future where death is controlled by "Scythes," Citra and Rowan must navigate moral dilemmas and a deadly competition.
                        </div>
                        <a href="https://www.goodreads.com/book/show/28954189-scythe" class="main-button" style="margin: 10px 0;">Read More</a>
                        <form action="add_favorite.php" method="POST">
    <input type="hidden" name="book_id" value="18"> <!-- Replace 1 with the actual book id -->
    <button type="submit" class="main-button">Add to Favorites</button>
</form>

            <br><br>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ***** Book Descriptions End ***** -->

<script>
    // JavaScript for Filtering Books by Genre
   // JavaScript for Filtering Books by Genre
document.getElementById('genre-filter').addEventListener('change', function () {
    const genre = this.value;
    const books = document.querySelectorAll('.book-item');

    books.forEach(book => {
        const dataGenre = book.getAttribute('data-genre');
        if (dataGenre) {
            const genres = dataGenre.split(',');
            if (genre === 'All' || genres.includes(genre)) {
                book.style.display = 'block';
            } else {
                book.style.display = 'none';
            }
        } else {
            // Jika book-item tidak memiliki data-genre
            book.style.display = 'none';
        }
    });
});

</script>

<?php include 'footer.php'; ?>
