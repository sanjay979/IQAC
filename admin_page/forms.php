<?php
session_start();
if ($_SESSION['s_id'] && $_SESSION['position'] == 'admin') {
?>
  <!DOCTYPE html>
  <html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SJC ADMIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <link rel="stylesheet" href="./assets/css/ApproveForm1.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
  </head>

  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
      <!-- Desktop sidebar -->
      <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            SJC Admin
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
              <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="forms.php">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
      <div class="flex flex-col flex-1">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
            <!-- Mobile hamburger -->
            <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                <div class="absolute inset-y-0 flex items-center pl-2">
                  <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for projects" aria-label="Search" />
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Theme toggler -->
              <li class="flex">
                <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
                  <template x-if="!dark">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                  </template>
                  <template x-if="dark">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                    </svg>
                  </template>
                </button>
              </li>
              <!-- Notifications menu -->

              <!-- Notification badge -->

              <!-- Profile menu -->
              <li class="relative">
                <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                  <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82" alt="" aria-hidden="true" />
                </button>
                <template x-if="isProfileMenuOpen">
                  <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">


                    <li class="flex">
                      <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="logout.php">
                        <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Log out</span>
                      </a>
                    </li>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <!-- search code starts  -->
            <div class="flex justify-center flex-1 lg:mr-32" style="margin:3%">
              <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                <div class="absolute inset-y-0 flex items-center pl-2">
                  <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                  </svg>
                </div>
                <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search for projects" aria-label="Search" />
              </div>
            </div>

            <div class="main-content">

              <main>

                <?php
                include("../database/database_connect.php");
                if (mysqli_connect_errno()) {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  exit();
                }

                // Retrieve all rows from the faculty1 table where hod=1 and aqict=3
                $query = "SELECT * FROM faculty1 WHERE hod = 3 or aqict = 3 or principal = 3";
                $result = mysqli_query($con, $query);

                // Generate the HTML table
                $html = '<div class="table-responsive">';
                $html .= '<table class="table table-striped table-bordered">';
                $html .= '<thead class="thead-dark">';
                $html .= '<tr>';
                $html .= '<th>S.N</th>';
                $html .= '<th>Staff Name</th>';
                $html .= '<th>Staff ID</th>';
                $html .= '<th>Leave Type</th>';
                $html .= '<th>Start Date</th>';
                $html .= '<th>End Date</th>';
                $html .= '<th>No of Days</th>';
                $html .= '<th>Reason</th>';
                $html .= '<th>Documents</th>';
                $html .= '<th>Comments</th>';

                $html .= '<th>Approval</th>';
                $html .= '</tr>';
                $html .= '</thead>';
                $html .= '<tbody>';

                $serialNumber = 1; // Initialize the serial number

                while ($row = mysqli_fetch_assoc($result)) {
                  $html .= '<tr id="row_' . $row['application_id'] . '">';
                  $html .= '<td>' . $serialNumber . '</td>'; // Add the serial number column
                  $html .= '<td>' . $row['name'] . '</td>';
                  $html .= '<td>' . $row['id'] . '</td>';
                  $html .= '<td>' . $row['LType'] . '</td>';
                  $html .= '<td>' . $row['start'] . '</td>';
                  $html .= '<td>' . $row['end'] . '</td>';
                  $html .= '<td>' . $row['ndays'] . '</td>';

                  $html .= '<td>' . $row['reason'] . '</td>';

                  $html .= '<td>';

                  if (!empty($row['file'])) {
                    $html .= '<a href="' . $row['file'] . '" target="_blank">View File</a>';
                  } else {
                    $html .= 'No File Available';
                  }

                  $html .= '</td>';

                  $html .= '<td>';
                  $html .= '<input type="text" name="comments[' . $row['application_id'] . ']" placeholder="Enter comments">';
                  $html .= '</td>';

                  $html .= '<td>';
                  $html .= '<form method="post">';
                  $html .= '<input type="hidden" name="leave_id" value="' . $row['application_id'] . '">';

                  // Add CSS classes to the buttons for styling
                  $html .= '<button class="reject-btn" type="button" onclick="updateApprovalStatus(' . $row['application_id'] . ', 0)">delete</button>';

                  $html .= '</form>';
                  $html .= '</td>';
                  $html .= '</tr>';

                  $serialNumber++; // Increment the serial number
                }

                $html .= '</tbody>';
                $html .= '</table>';
                $html .= '</div>';

                // Output the generated HTML table
                echo $html;
                ?>

                <script>
                  function updateApprovalStatus(leaveID, status) {

                    var comments = $("input[name='comments[" + leaveID + "]']").val(); // Get the comments for the specific row

                    $.ajax({
                      type: 'POST',
                      url: 'update_approval.php', // PHP file to handle the update
                      data: {
                        leave_id: leaveID,
                        status: status,
                        comments: comments
                      },
                      success: function(response) {
                        // Handle the response
                        if (response === 'success') {
                          // Remove the row from the table
                          $('#row_' + leaveID).remove();

                          // Update the serial numbers of remaining rows
                          updateSerialNumbers();
                        } else {
                          console.log(response); // Log the error message for debugging
                        }
                      }
                    });
                  }

                  function updateSerialNumbers() {
                    var rows = $('table tbody tr'); // Get all table rows

                    rows.each(function(index) {
                      $(this).find('td:first-child').text(index + 1); // Update the serial number column
                    });
                  }
                </script>

              </main>
            </div>

          </div>
      </div>
    </div>
    </main>
    </div>
    </div>
  </body>

  </html>
<?php
} else {
  header("location:index.php");
}
?>