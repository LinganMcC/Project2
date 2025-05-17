<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="Meet the Team Behind EcruSoft Solutions" />
    <meta name="keywords" content="HTML5, CSS, team, about us, group profile" />
    <meta name="author" content="Liam McCarthy" />
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/layout.css">
    <title>Meet Our Awesome Team - EcruSoft Solutions</title>
</head>
<body>
    <!-- Include header -->
    <?php include 'includes/header.inc.php'; ?>
    <!-- Include navbar -->
    <?php include 'includes/navbar.inc.php'; ?>

    <aside class="photo-aside">
        <figure class="photo-card">
            <figcaption>The EcruSoft Solutions Team</figcaption>
            <img src="styles/images/group_photo.png" alt="Our Collaborative Team" loading="lazy">
            <figcaption>
                Liam McCarthy, Justin Mac, Sokhour Kim, Dylan Jayawardhana
            </figcaption>
            <figcaption>
                Student IDs: 105336043, 105921614, 104345352, 10590395
            </figcaption>
        </figure>
    </aside> 
    <main>
        <section class="about-section">
            <h2>Our Collaborative Journey</h2>
            <p>
                Welcome to the heart of EcruSoft Solutions! We are a passionate and dedicated group of individuals,
                each bringing unique skills and perspectives to the table. Our journey began with a shared vision
                to create innovative and effective web solutions. This page offers a glimpse into who we are,
                what drives us, and how our collective strengths make EcruSoft Solutions a dynamic and successful team.
            </p>
        </section>

        <section id="team-profiles">
            <h2>Our Collaborative Journey</h2>
            <div class="member-card">
                <h3>Liam McCarthy</h3>
                <p>
                    A creative force with a keen eye for design, Liam laid the foundation for our online presence
                    by developing the Index page, the core CSS foundation and modularity for smaller screens and mobile devices. His commitment to a user-friendly experience
                    is invaluable to our team.
                </p>
                <p><strong>Key Contributions:</strong> Index page development, foundational CSS, and modularity for smaller screen sizes.</p>
            </div>
        
            <div class="member-card">
                <h3>Justin Mac</h3>
                <p>
                    The architect of our career section, Justin meticulously crafted the Job page and its
                    accompanying styles. His focus on structure and clarity ensures a seamless experience for
                    prospective team members.
                </p>
                <p><strong>Key Contributions:</strong> Job page development and styling.</p>
            </div>
        
            <div class="member-card">
                <h3>Sokhour Kim</h3>
                <p>
                    With a focus on engagement and information, Sokhour developed the Apply page and contributed
                    to the initial About page structure. His dedication to clear communication is vital to our
                    outreach efforts.
                </p>
                <p><strong>Key Contributions:</strong> Apply page development, initial About page contribution.</p>
            </div>
        
            <div class="member-card">
                <h3>Dylan Jayawardhana</h3>
                <p>
                    Bringing his unique insights, Dylan contributed to the development of the About page, helping
                    to shape our group's narrative and introduce us to our audience.
                </p>
                <p><strong>Key Contributions:</strong> About page contribution.</p>
            </div>
        </section>  
        <section id="members-interests">
            <h3>A Glimpse into Our Interests</h3>
            <p>Beyond our professional endeavors, we have a diverse range of interests that enrich our team dynamic
                and foster creativity.</p>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Names:</th>
                            <th>Sokhour Kim</th>
                            <th>Justin Mac</th>
                            <th>Liam McCarthy</th>
                            <th>Dylan Jayawardhana</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="3">Hobbies</th>
                            <td colspan="5">Gaming</td>
                        </tr>
                        <tr>
                            <td>Traveling</td>
                            <td>Catapult woodchips at birds</td>
                            <td>Music</td>
                            <td>Basketball</td>
                        </tr>
                        <tr>
                            <td>Cooking</td>
                            <td>Confectionery</td>
                            <td>Volleyball</td>
                            <td>Music</td>
                        </tr>
                        <tr>
                            <th>Personal Passion</th>
                            <td>Coding</td>
                            <td>Get money</td>
                            <td>Cooking</td>
                            <td>Reading</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section id="group-profile" class="full-width-section">
            <h3>Our Shared Vision</h3>
            <article id="our-values">
                <h4>Core Values</h4>
                <p>
                    At EcruSoft Solutions, we are united by a set of core values that guide our work and interactions.
                    These include:
                </p>
                <ul class="values-list">
                    <li><strong>Collaboration:</strong> We believe in the power of teamwork and open communication.</li>
                    <li><strong>Innovation:</strong> We are constantly seeking new and creative solutions.</li>
                    <li><strong>Excellence:</strong> We are committed to delivering high-quality work in everything we do.</li>
                    <li><strong>Growth:</strong> We foster an environment of continuous learning and development.</li>
                    <li><strong>Client Focus:</strong> We prioritize understanding and meeting the needs of our clients.</li>
                </ul>
            </article>

            <article id="our-goals">
                <h4>Our Goals</h4>
                <p>
                    Our primary goal is to be a leading provider of innovative and reliable web solutions. We strive
                    to empower businesses and individuals through technology, creating impactful and user-friendly
                    digital experiences. We are dedicated to staying at the forefront of web development trends and
                    continuously improving our skills and services.
                </p>
            </article>
        </section>
    </main>

</body>
    <!-- Include footer -->
    <?php include 'includes/footer.inc.php'; ?>
</body>
</html>
