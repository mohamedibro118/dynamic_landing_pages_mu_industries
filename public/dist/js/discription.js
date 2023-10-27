
  // $(document).ready(function() {

  //   //footer desc
  //   var descriptionfooter = $('.footerdesc');
  //   var maxLength = 100;

  //   if (descriptionfooter.text().length > maxLength) {
  //     var shortText = descriptionfooter.text().substring(0, maxLength) + '...';
  //     var longText = descriptionfooter.text();
  //     descriptionfooter.html(shortText);}




  //   //single-pages desc
  //   var description = $('.description');
  //   var maxLength = 100;

  //   if (description.text().length > maxLength) {
  //     var shortText = description.text().substring(0, maxLength) + '...';
  //     var longText = description.text();
  //     description.html(shortText);

  //     description.after('<a style="color: #b69559;" href="#" class="read-more">Read more</a>');

  //     $('.read-more').click(function(e) {
  //       e.preventDefault();
  //       var link = $(this);

  //       if (link.text() === 'Read more') {
  //         link.text('Read less');
  //         description.html(longText);
  //       } else {
  //         link.text('Read more');
  //         description.html(shortText);
  //       }
  //     });
  //   }

    
    document.addEventListener("DOMContentLoaded", function() {
      const showMoreButton = document.querySelector(".show-more-button");
      const showMoreContent = document.querySelector(".show-more-content");

      showMoreButton.addEventListener("click", function() {
        console.log('test');
          showMoreContent.classList.toggle("show-more-content");

          if (showMoreButton.textContent === "Show More") {
              showMoreButton.textContent = "Show Less";
          } else {
              showMoreButton.textContent = "Show More";
          }
      });
  });



  // });

