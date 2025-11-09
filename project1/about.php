<!-- Person In Charge: Hoang Thi Thuy Trang
 Student ID: 105711747-->

<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$pageTitle = "About Us";
$pageDescription = "Learn more about our group and our mission.";
$pageSpecificStyle = "about";
include('metadata.inc');
?>

<body id="about">
  <!-- Header inclusion -->
  <?php include 'header.inc'; ?>

  <main>
     <?php include 'backtotopbutton.inc'; ?>

    <section class="about_intro">
      <img src="images/groupimage.png" alt="My team">
      <article>
        <h1>About our group</h1>
        <p>We are a group of students passionate about technology.<br>Working together to build this website as a way to
          practice our skills and provide the best experience for users.</p>
        <a class="primary" href="#group-info">More details</a>
      </article>
    </section>
    <section>
      <div class="center_aligned">
        <h1>Group Information</h1>
      </div>
      <div class="achievement" id="group-info">
        <div class="row">
          <img src="images/svg/team.svg" alt="Team">
          <h2>Weavers</h2>
        </div>
        <div class="row">
          <img src="images/svg/clock.svg" alt="Time">
          <h2>9:00AM-12:00PM <br>Friday</h2>
        </div>
        <div class="row">
          <img src="images/svg/tutor.svg" alt="Tutor">
          <h2>Thomas Harrison</h2>
        </div>
      </div>
      <div class="center_aligned">
        <h1>Member IDs</h1>
      </div>
      <ol class="row member_ids">
        <li>Nguyen Duc Nam
          <ul>
            <li>105544406</li>
          </ul>
        </li>

        <li>Nguyen Nhat Lam
          <ul>
            <li>105553871</li>
          </ul>
        </li>

        <li>Hoang Thi Thuy Trang
          <ul>
            <li>105711747</li>
          </ul>
        </li>

        <li>Do Trung Son
          <ul>
            <li>103803451</li>
          </ul>
        </li>
      </ol>

    </section>
    <section class="task">
      <div class="center_aligned">
        <h1>Members' Contributions</h1>
      </div>
      <div class="contribution-grid">
        <div class="contribution">
          <h3>Nguyen Duc Nam</h3>
          <ul>
            <li>Planned and delegated tasks appropriately to each team member</li>
            <li>Developed the login and search functions</li>
            <li>Designed the layout of the management page</li>
          </ul>
        </div>
        <div class="contribution">
          <h3>Nguyen Nhat Lam</h3>
          <ul>
            <li>Create the job description database</li>
            <li>Improved accessibility for the job description page</li>
            <li>Braintormed ideas for the presentation content</li>
          </ul>
        </div>
        <div class="contribution">
          <h3>Hoang Thi Thuy Trang</h3>
          <ul>
            <li>Create a enhancements page as specified in the PDF file</li>
            <li>Update members contribution on the about page</li>
            <li>Edited the layout of presentation slides</li>
          </ul>
        </div>
        <div class="contribution">
          <h3>Do Trung Son</h3>
          <ul>
            <li>Create an EOI table</li>
            <li>Linked the apply page to submit data on the database</li>
            <li>Contributed ideas for developing the presentation content</li>
          </ul>
        </div>
      </div>
    </section>
    <section class="interests">
      <div class="center_aligned">
        <h2>Members' Interests</h2>
      </div>
      <div class="interest-table">
        <table>
          <thead>
            <tr>
              <th>Member Name</th>
              <th>Hobbies</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="member-name">Nguyen Duc Nam</div>
              </td>
              <td>
                <span class="hobby-tag">Team brainstorming sessions</span>
                <span class="hobby-tag">Photography</span>
                <span class="hobby-tag">Exploring modern web technologies</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="member-name">Nguyen Nhat Lam</div>
              </td>
              <td>
                <span class="hobby-tag">Playing piano</span>
                <span class="hobby-tag">Listening to lofi music while coding</span>
                <span class="hobby-tag">Exploring modern web technologies</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="member-name">Hoang Thi Thuy Trang</div>
              </td>
              <td>
                <span class="hobby-tag">Traveling</span>
                <span class="hobby-tag">Creating engaging website content</span>
                <span class="hobby-tag">Designing user interface</span>
              </td>
            </tr>
            <tr>
              <td>
                <div class="member-name">Do Trung Son</div>
              </td>
              <td>
                <span class="hobby-tag">Optimizing server databases</span>
                <span class="hobby-tag">Improving website usability</span>
                <span class="hobby-tag">UI/UX design</span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  </main>
  <!-- Footer inclusion -->
  <?php include 'footer.inc'; ?>
</body>

</html>