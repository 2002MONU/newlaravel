<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"  >
</head>
<body>


    <form action="{{ route('submitFeedback', ['id' => $user->id]) }}" method="POST">
        @csrf  <!-- Include CSRF protection -->
        
        <textarea name="comment" placeholder="Leave your feedback" required></textarea>
        
        <div class="star-rating">
            <!-- Star rating elements here, handle selection via JavaScript -->
            <span class="star" data-value="1">&#9733;</span>
            <span class="star" data-value="2">&#9733;</span>
            <span class="star" data-value="3">&#9733;</span>
            <span class="star" data-value="4">&#9733;</span>
            <span class="star" data-value="5">&#9733;</span>
        </div>
        
        <input type="hidden" name="rating" id="rating-value" value="">
        
        <button type="submit">Submit Feedback</button>
    </form>
    
    <!-- Add JavaScript to handle star rating selection -->
    <script>
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating-value');
        
        stars.forEach(star => {
            star.addEventListener('click', () => {
                // Set the rating value
                ratingInput.value = star.getAttribute('data-value');
                
                // Highlight the selected stars
                stars.forEach(s => s.style.color = s.getAttribute('data-value') <= star.getAttribute('data-value') ? 'gold' : 'black');
            });
        });
    </script>
    
 
</body>
</html>