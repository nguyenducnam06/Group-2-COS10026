<!-- Person In Charge: Nguyen Duc Nam
 Student ID: 105544406
 ChatGPT prompts for clients, journey, vision sections: Write me a short content about the company's clients, journey in a timeline style and company vision with 3 bullet points of a network company called NetVision
 SVG source: Iconify plugin on Figma-->

<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$pageTitle = "Home";
$pageDescription = "Leading Network and Cybersecurity Solutions";
$pageSpecificStyle = "index";
include('metadata.inc');
?>

<body>
    <!-- Header Section -->
    <?php include 'header.inc'; ?>

    <!-- Main Content -->
    <main>
        <!-- Back to top button -->
        <?php include 'backtotopbutton.inc'; ?>

        <!-- Search bar -->
        <section class="input_with_button">
            <label for="search" class="hidden">Search</label>
            <input type="text" name="search" id="search" placeholder="Search something" />
            <button class="primary">Search</button>
        </section>
        <!-- Introduction Section -->
        <section class="intro">
            <div class="left_aligned">
                <h1>Broaden <br> Your Vision</h1>
                <p>With us, every step you take is a step into the future. We are a leading company in Cybersecurity
                    and
                    Network
                    Administration, trusted by partners in over 30 countries worldwide.</p>
                <div class="row">
                    <a class="primary" href="apply.php">Join Us</a>
                    <a class="secondary" href="jobs.php">All Positions</a>
                </div>
            </div>
            <!-- Introduction Images, source: https://3dicons.co/ -->
            <div class="intro_img">
                <img src="images/bulb.png" class="intro_img1" alt="Bulb">
                <img src="images/shield.png" class="intro_img2" alt="Shield">
                <img src="images/explorer.png" class="intro_img3" alt="Explorer">
                <img src="images/lab.png" class="intro_img4" alt="Lab">
            </div>
        </section>

        <!-- Achievements Section -->
        <section>
            <h1 class="center_aligned">What We Have Achieved</h1>
            <div class="achievement">
                <div class="row">
                    <img src="images/svg/calendar.svg" alt="Calendar">
                    <div>
                        <h2>19</h2>
                        <h5>Years</h5>
                    </div>
                </div>
                <div class="row">
                    <img src="images/svg/world.svg" alt="World">
                    <div>
                        <h2>30+</h2>
                        <h5>Countries</h5>
                    </div>
                </div>
                <div class="row">
                    <img src="images/svg/handshake.svg" alt="Handshake">
                    <div>
                        <h2>17</h2>
                        <h5>Partners</h5>
                    </div>
                </div>
                <div class="row">
                    <img src="images/svg/user.svg" alt="User">
                    <div>
                        <h2>54K</h2>
                        <h5>Users</h5>
                    </div>
                </div>
                <div class="row">
                    <img src="images/svg/project.svg" alt="Project">
                    <div>
                        <h2>128</h2>
                        <h5>Projects</h5>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Clients Section -->
        <section>
            <article class="left_aligned">
                <h1>Our Clients</h1>
                <p>At NetVision, we grow through connection. Together with
                    our global partners, we build networks that inspire trust, speed, and limitless possibilities.</p>
            </article>
            <div class="row">
                <div class="card">
                    <img src="images/company1.jpg" alt="Company 1">
                    <div class="card_content">
                        <img src="images/viettellogo.png" alt="Viettel Logo">
                        <p>Partnering with Viettel to enhance regional infrastructure and cross-border data exchange,
                            driving digital
                            transformation throughout Southeast Asia.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/company2.jpg" alt="Company 2">
                    <div class="card_content">
                        <img src="images/awslogo.png" alt="AWS Logo">
                        <p>Collaborating with Amazon Web Services to optimize cloud connectivity and resilience, helping
                            enterprises scale
                            seamlessly across continents.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="images/company3.jpg" alt="Company 3">
                    <div class="card_content">
                        <img src="images/googlelogo.png" alt="Google Logo">
                        <p>Empowering Google's data-driven world through secure, high-speed network architectures —
                            ensuring millions of daily
                            queries travel faster and safer across the globe.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Journey Section -->
        <section class="journey">
            <article class="center_aligned">
                <h1>From an Idea to <br>
                    a Global Journey</h1>
                <p>Every great journey begins with a single idea. At Netvision, our story was woven from a passion for
                    technology, a desire
                    for connection, and a limitless vision. Let's look back at the milestones that have shaped who we
                    are today.</p>
            </article>
            <div class="timeline">
                <div class="timeline_content">
                    <h2>2006</h2>
                    <div class="journey_content content_background">
                        <article class="left_aligned ">
                            <h2>The Spark</h2>
                            <p>In a small lab, NetVision was born from two network engineers who shared a common
                                goal:
                                to
                                simplify and secure the
                                connected world for businesses. The first lines of code were written, and a legacy
                                began.
                            </p>
                        </article>
                    </div>
                </div>
                <div class="timeline_content">
                    <div class="journey_content content_background">
                        <article class="right_aligned">
                            <h2>Building Trust</h2>
                            <p>In a small lab, NetVision was born from two network engineers who shared a common
                                goal:
                                to
                                simplify and secure the
                                connected world for businesses. The first lines of code were written, and a legacy
                                began.
                            </p>
                        </article>
                    </div>
                    <h2>2007 - 2015</h2>
                </div>
                <div class="timeline_content">
                    <h2>2016 - 2022</h2>
                    <div class="journey_content content_background">
                        <article class="left_aligned">
                            <h2>Going Global</h2>
                            <p>Our reach expanded across the world with our first major contract in the European
                                market.
                                Netvision was officially on
                                the global tech map, protecting data for businesses in over 15 countries.</p>
                        </article>
                    </div>
                </div>
                <div class="timeline_content">
                    <div class="journey_content content_background">
                        <article class="right_aligned">
                            <h2>Spark Innovation</h2>
                            <p>With a talented team and the trust of partners in over 30 countries, we don't just
                                manage
                                networks—we architect the
                                future of connectivity. The journey continues, and the next chapter is waiting for
                                you
                                to
                                write with us.</p>
                        </article>
                    </div>
                    <h2>2023 - Now</h2>
                </div>
            </div>
        </section>

        <!-- Our Vision Section -->
        <section class="vision">
            <article class="right_aligned">
                <h1>The "Vision" <br> Of Our Own</h1>
                <p>We see a future where technology connects people seamlessly and with absolute security. It’s a grand
                    picture, and these
                    are the pieces we are building every day.</p>
            </article>
            <div class="row vision_background">
                <!-- 1st vision content -->
                <article class="left_aligned">
                    <div class="number">
                        <h1>1</h1>
                    </div>
                    <h2>Engineer a seamless world</h2>
                    <p>Our goal is a future where every connection, from enterprise to individual, is guaranteed
                        to
                        be fast, stable, and
                        uninterrupted. A world where technology truly flows.</p>
                </article>
                <!-- 2nd vision content -->
                <article class="left_aligned">
                    <div class="number">
                        <h1>2</h1>
                    </div>
                    <h2>Enhance cybersecurity</h2>
                    <p>By leveraging AI and breakthrough technologies, Netvision aims to redefine the standard
                        of online safety, making peace
                        of mind the default.</p>
                </article>
                <!-- 3rd vision content -->
                <article class="left_aligned">
                    <div class="number">
                        <h1>3</h1>
                    </div>
                    <h2>Empower Global Growth</h2>
                    <p>We believe a solid network infrastructure is the foundation for every great idea. Our
                        vision is to be the trusted
                        technology partner that empowers businesses from startups to corporations to confidently
                        reach a global stage.</p>
                </article>
            </div>
        </section>
        <!-- Newsletter Section -->
        <aside class="center_aligned">
            <h1>Stay Updated With Us</h1>
            <p>Subscribe to our newsletter and get the latest news on company updates, recruitment information</p>
            <div class="input_with_button">
                <label for="email" class="hidden">Email</label>
                <input type="email" name="email" id="email" placeholder="joefred@gmail.com" maxlength="100" />
                <button id="subscribe" class="primary">Subscribe</button>
            </div>
        </aside>
    </main>

    <!-- Footer Section -->
    <?php include 'footer.inc'; ?>
</body>

</html>