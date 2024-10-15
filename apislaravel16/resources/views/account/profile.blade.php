<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>
<body>
   <h1>Hello World</h1>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
    function fetchUserData(token) {
     console.log('Token being used:', token); // Debugging to see if the token is retrieved correctly
 
     fetch('/user', { // Ensure the URL is correct
         method: 'GET',
         headers: {
             'Authorization': `Bearer ${token}`,
             'Content-Type': 'application/json',
         },
     })
     .then(response => {
         if (!response.ok) {
             console.log('Invalid token or unauthorized. Redirecting to login.'); // Debugging line
             window.location.href = '/login'; // Redirect to login
         } else {
             return response.json(); // Handle the successful response
         }
     })
     .catch(error => {
         console.error('Error fetching user data:', error);
         window.location.href = '/login'; // Redirect to login on error
     });
 }
 
 $(document).ready(function() {
     const token = localStorage.getItem('user_token');
     console.log("Token found in localStorage:", token); // Debugging line
 
     const pathname = window.location.pathname;
     console.log('Current pathname:', pathname); // Debugging line
 
     if (pathname === '/user' && !token) {
         // No token, redirect to login
         window.location.href = '/login';
         return;
     }
 
     if ((pathname === '/login' || pathname === '/register') && token) {
         // User is already logged in, redirect to profile
         window.location.href = '/profile';
         return;
     }
 
     if (!token) {
         // No token, redirect to login
         window.location.href = '/login';
     } else if (pathname !== '/login' && pathname !== '/register') {
         // Fetch user data if not on login or register page
         fetchUserData(token);
     }
 });
 </script>
 
</body>
</html>