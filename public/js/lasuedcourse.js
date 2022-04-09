
  // Get rid of small loading animation
  [...document.querySelectorAll(".input-location-dependant")].forEach(element =>
    element.classList.toggle("d-none")
  );

  // Function to set multiple attributes at once
  const setAttributes = (el, attrs) => {
    for (var key in attrs) {
      el.setAttribute(key, attrs[key]);
    }
  };

  const toggleLGA = target => {
    let state = target.value,                                                         // Get value of state
      selectLGAOption = ["Select COURSE..."],                                            // Define this once so as not to repeat it multiple times
      lgaList = {
        COHED: [
          "B.A. Ed. History & Diplomatic Studies",
          "B.A. History & Diplomatic Studies",
          "B.A. Ed. Christian Religious Studies",
          "B.A. Christian Religious Studies",
          "B.A. Ed Islamic Studies",
          "B.A. Islamic Studies",
          "B.A. Ed Fine Arts",
          "B.A. Fine Arts",
          "B.A. Ed. Music",
          "B.A. Music",
          "B.A. Theatre & Performing Arts"
        ],
        COSED: [
          "Demsa",
          
          "Yola South"
        ],
        COFTED: [
          "Abak",
          
          "Uyo"
        ],
        COVED: [
          "Aguata",
          
          "Oyi"
        ],

        COMSSED: [
          "Aguata",
          
          " Zaki"
        ],

        COLCAED: [
          "Brass",
          
          "Yenagoa"
        ],
        Benue: [
          "Agatu",
          
          "Vandeikya"
        ]
        
      }[state],                                                                       // Ternary switch operator to show list of LGAs based on chosen state
      lgas = [...selectLGAOption, ...Object.values(lgaList)],                         // Join select LGA option with list of LGAs
      form = target.parentElement.parentElement.parentElement.parentElement,          // Get parent up to the forth generation just in case LGA select element is deeply nested
      lgaSelect = form.querySelector(".select-lga"),                                  // Get the LGA select element
      length = lgaSelect.options.length;                                              // Get number of options already existing in LGA select element

    // Clear LGS select element
    for (i = length - 1; i >= 0; i--) {
      lgaSelect.options[i] = null;
    }

    // Populate LGA select element
    lgas.forEach(lga => {
      let opt = document.createElement("option");                                     // Create option element
      opt.appendChild(document.createTextNode(lga));                                  // Append LGA to it
      opt.value = lga;                                                                // Set the value to LGA

      // Make option asking you to select unclickable
      lga.includes("elect")
        ? setAttributes(opt, { disabled: "disabled", selected: "selected" })
        : "";

      // Add this option element to LGA select element
      lgaSelect.appendChild(opt);
    });
  };
