document.addEventListener("DOMContentLoaded", function() {
  const tocList = document.querySelector(".toc_list");
  const headings = document.querySelectorAll(".el_edit h2");
  const header = document.querySelector(".ly_header");
  const headerHeight = header.offsetHeight;

  headings.forEach(function(heading, index) {
      const listItem = document.createElement("li");
      const link = document.createElement("a");

      link.textContent = heading.textContent;
      link.href = "#";  // hrefは空のリンク

      link.addEventListener('click', function(event) {
          event.preventDefault();
          const targetPosition = heading.getBoundingClientRect().top + window.pageYOffset - headerHeight;

          window.scrollTo({
              top: targetPosition,
              behavior: 'smooth'
          });
      });

      listItem.appendChild(link);
      tocList.appendChild(listItem);
  });
});