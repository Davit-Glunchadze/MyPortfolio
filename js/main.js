  
  /**
   * Header toggle
   */
  const headerToggleBtn = document.querySelector('.header-toggle');
  function headerToggle() {
    const header = document.querySelector('#header');
    header.classList.toggle('header-show');
    headerToggleBtn.classList.toggle('bi-list');
    headerToggleBtn.classList.toggle('bi-x');
  }
  if (headerToggleBtn) {
    headerToggleBtn.addEventListener('click', headerToggle);
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  const navmenuLinks = document.querySelectorAll('#navmenu a');
  navmenuLinks.forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.header-show')) {
        headerToggle();
      }
    });
  });
  /**
   * Toggle mobile nav dropdowns
   */
  const toggleDropdowns = document.querySelectorAll('.navmenu .toggle-dropdown');
  toggleDropdowns.forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');
  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  if (scrollTop) {
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      });
    }
  }
  window.addEventListener('load', aosInit);

  /**
   * Init typed.js
   */
  document.addEventListener('DOMContentLoaded', function() {
    // Typed.js initialization (if needed)
    const selectTyped = document.querySelector('.typed');
    if (selectTyped) {
        let typed_strings = selectTyped.getAttribute('data-typed-items');
        typed_strings = typed_strings.split(',');
        if (typeof Typed !== 'undefined') {
            new Typed(selectTyped, {
                strings: typed_strings,
                loop: true,
                typeSpeed: 100,
                backSpeed: 50,
                backDelay: 2000
            });
        } else {
            console.error("Typed.js is not loaded.");
        }
    }

    // PureCounter initialization
    if (typeof PureCounter !== 'undefined') {
        new PureCounter();
    } else {
        console.error("PureCounter script is not loaded.");
    }
  });

  /**
   * Animate the skills items on reveal
   */
  document.addEventListener('DOMContentLoaded', function() {
    const skillsAnimation = document.querySelectorAll('.skills-animation');
    skillsAnimation.forEach((item) => {
      new Waypoint({
        element: item,
        offset: '80%',
        handler: function(direction) {
          const progress = item.querySelectorAll('.progress .progress-bar');
          progress.forEach(el => {
            el.style.width = el.getAttribute('aria-valuenow') + '%';
          });
        }
      });
    });
  });
  

  /**
   * Initiate glightbox
   */
  
  // Ensure GLightbox is loaded before initializing
  document.addEventListener('DOMContentLoaded', function() {
  if (typeof GLightbox !== 'undefined') {
    const glightbox = GLightbox({
      selector: '.glightbox'
    });
  } else {
    console.error("GLightbox script is not loaded.");
  }
});

 /**
   * Init isotope layout and filters
   */
document.addEventListener("DOMContentLoaded", function() {
  let isotopeContainers = document.querySelectorAll('.isotope-layout');

<<<<<<< HEAD
    // Check filter validation
    if (filter !== '*' && !document.querySelector(filter)) {
        console.error('Invalid filter selector:', filter);
    }

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
        initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
            itemSelector: '.isotope-item',
            layoutMode: layout,
            filter: filter,  // შერჩეული ფილტრი
            sortBy: sort
        });
    });
});

=======
  isotopeContainers.forEach(function(isotopeItem) {
      let layout = isotopeItem.getAttribute('data-layout') || 'masonry';
      let filter = isotopeItem.getAttribute('data-default-filter') || '*';
      let sort = isotopeItem.getAttribute('data-sort') || 'original-order';
      
      let container = isotopeItem.querySelector('.isotope-container');

      if (!container) {
          console.error("Isotope container not found inside", isotopeItem);
          return;
      }

      // ელოდება, სანამ სურათები ჩაიტვირთება
      imagesLoaded(container, function() {
          let iso = new Isotope(container, {
              itemSelector: '.isotope-item',
              layoutMode: layout,
              filter: filter,
              sortBy: sort
          });

          // ფილტრის ღილაკებზე კლიკის დამატება
          let filters = document.querySelectorAll('.portfolio-filters li');
          filters.forEach(function(filterBtn) {
              filterBtn.addEventListener('click', function() {
                  let filterValue = this.getAttribute('data-filter');

                  // ყველა ღილაკიდან ვშლით `filter-active` კლასს
                  document.querySelector('.portfolio-filters .filter-active')?.classList.remove('filter-active');
                  
                  // ვამატებთ `filter-active` მიმდინარე ღილაკს
                  this.classList.add('filter-active');

                  // ვცვლით Isotope-ის ფილტრს
                  iso.arrange({ filter: filterValue });
              });
          });
      });
  });
});
>>>>>>> 4842a9bdbebabce802a7f183ad4a6954c814d87e

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  const navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);


/**
 * Function to download the resume as a PDF file
 */
const downloadBtn = document.querySelector("#downloadBtn");
const resumeElement = document.querySelector("#resume");
document.addEventListener('DOMContentLoaded', function() {
  const downloadBtn = document.querySelector("#downloadBtn");
  const resumeElement = document.querySelector("#resume");

  if (downloadBtn && resumeElement) {
    downloadBtn.addEventListener("click", () => {
      downloadBtn.disabled = true;
      downloadBtn.textContent = "Generating PDF...";
      html2pdf()
        .from(resumeElement)
        .save("David-Glunchadze-resume.pdf")
        .then(() => {
          downloadBtn.disabled = false;
          downloadBtn.textContent = "Download Resume";
        })
        .catch((error) => {
          console.error("Error generating PDF:", error);
          downloadBtn.disabled = false;
          downloadBtn.textContent = "Download Resume";
        });
    });
  } else {
    console.error("Element with id 'resume' or 'downloadBtn' not found.");
  }
});
