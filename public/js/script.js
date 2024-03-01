$(() => {
    // Place data
    const placeDataUrl =
      "https://gist.githubusercontent.com/knot-freshket/142c21c3e8e54ef36e33f5dc6cf54077/raw/94ebab16839484f06d42eb799e30d0a945ff1a1b/freshket-places.json";
  
    // Tag data
    const tagDataUrl =
      "https://gist.githubusercontent.com/knot-freshket/fa49e0a5c6100d50db781f28486324d2/raw/55bc966f54423dc73384b860a305e1b67e0bfd7d/freshket-tags.json";
  
    $.getJSON(tagDataUrl, function (tagsData) {
      if (typeof tagsData !== "undefined" && Array.isArray(tagsData)) {
        const tagObject = tagsData.reduce((acc, tag) => {
          acc[tag.id] = tag.name;
          return acc;
        }, {});
  
        $.getJSON(placeDataUrl, function (placesData) {
          if (typeof placesData !== "undefined" && Array.isArray(placesData)) {
            const cardListContent = placesData
              .map((place) => {
                const tagsContent = place.tags
                  .map((tagId) => {
                    return `<span class="tag-item">${tagObject[tagId]}</span>`;
                  })
                  .join("");
  
                return `<div class="card-block">
                      <div class="card">
                          <div class="card-image"><img src="${place.img_url}" alt="${place.name}" /></div>
                          <div class="card-title">${place.name}</div>
                          <div class="card-content">${place.body}</div>
                          <div class="card-tag-list">${tagsContent}</div>
                      </div>
                  </div>`;
              })
              .join("");
  
            $("#placeList").html(cardListContent);
          }
        });
      }
    });
  });
  