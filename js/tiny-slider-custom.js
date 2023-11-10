window.addEventListener(
  "DOMContentLoaded",
  function () {
    var slider = tns({
      container: ".my-slider",
      items: 1,
      axis: "horizontal",
      autoplay: true,
      preventScrollOnTouch: "auto",
      mouseDrag: true,
      swipeAngle: false,
      navPosition: "bottom",
      arrowKeys: true,
      controls: false,
      autoplayButtonOutput: false,

      responsive: {
        640: {
          edgePadding: 20,
          gutter: 20,
          items: 1,
        },
        700: {
          gutter: 30,
        },
        900: {
          items: 1,
        },
      },
    });

    var slider = tns({
      container: ".my-slider-desktop",
      controlsContainer: "#customize-controls",
      items: 1,
      axis: "horizontal",
      autoplay: true,
      preventScrollOnTouch: "auto",
      mouseDrag: true,
      swipeAngle: false,
      navPosition: "bottom",
      arrowKeys: true,
      autoplayButtonOutput: false,
    });

    var slider = tns({
      container: ".slider-categorias",
      controlsContainer: "#customize-controls-categorias",
      items: 3,
      axis: "horizontal",
      autoplay: true,
      preventScrollOnTouch: "auto",
      mouseDrag: true,
      fixedWidth: 400,
      swipeAngle: false,
      navPosition: "bottom",
      autoplayButtonOutput: false,
      arrowKeys: true,
      center: true,
      responsive: {
        500: {
          items: 1.2,
          edgePadding: 0,
          gutter: 20,
        },
        640: {
          edgePadding: 20,
          gutter: 20,
          items: 1.2,
        },
        700: {
          gutter: 30,
        },
        900: {
          items: 3,
        },
      },
    });

    var slider = tns({
      container: ".slider-produtos",
      controlsContainer: "#customize-controls-clientes",
      items: 3,
      axis: "horizontal",
      autoplay: true,
      preventScrollOnTouch: "auto",
      mouseDrag: true,
      fixedWidth: 250,
      swipeAngle: false,
      navPosition: "bottom",
      autoplayButtonOutput: false,
      arrowKeys: true,
      gutter: 20,
      responsive: {
        500: {
          items: 2,
          edgePadding: 20,
          gutter: 20,
        },
        640: {
          edgePadding: 20,
          gutter: 20,
          items: 2,
        },
        700: {
          gutter: 30,
        },
        900: {
          items: 3,
        },
      },
    });

    var slider2 = tns({
      container: ".slider-clientess",
      controlsContainer: "#customize-controls-clientes",
      axis: "horizontal",
      autoplay: true,
      autoWidth: true,
      preventScrollOnTouch: "auto",
      mouseDrag: true,
      swipeAngle: false,
      navPosition: "bottom",
      autoplayButtonOutput: false,
      arrowKeys: true,
      gutter: 20,
      responsive: {
        500: {
          items: 1,
        },
        640: {
          items: 1,
        },
        700: {
          gutter: 30,
        },
        900: {
          items: 3,
        },
      },
    });
  },
  { passive: true }
);
