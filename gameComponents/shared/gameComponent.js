class GameComponent {
  constructor(init_x, init_y, width, height, imageUrl, canvas_width) {
    this.width = width ? width : randomWidth(canvas_width);
    this.height = height;
    this.position = new Position(
      init_x >= 0 ? init_x : randomXValue(canvas_width),
      init_y,
      width,
      height
      );
    this.sprite = new Image();
    this.sprite.src = imageUrl;
  }

  update(x, y) {
    this.position.update(x,y);
  }

  collidesWith(otherobj) {
    let left = otherobj.position.x;
    let right = otherobj.position.endX;
    let top = otherobj.position.y;
    let bottom = otherobj.position.endY;

    if (
      (this.position.y >= top && this.position.y <= bottom) ||
      (this.position.endY >= top && this.position.endY <= bottom) ||
      (this.position.y <= top && this.position.endY >= bottom)
    ) {
      if (
        (this.position.x >= left && this.position.x <= right) ||
        (this.position.endX >= left && this.position.endX <= right)
      ) {
        return true;
      }
    }
    return false;
  }

  // Slight Optimization on collision detection
  // Stops looking for collisions with objects far away on vertical plane
  hasCollsionWith(sortedArray, canvasMidPoint) {
    let verticalState = this.y < canvasMidPoint ? "Top" : "Bottom";
    if (verticalState == "Top") {
      var i = 0;
      while (
        i < sortedArray.length &&
        sortedArray[i].y <= canvasMidPoint &&
        sortedArray[i].y <= this.endY
      ) {
        if (this.collidesWith(sortedArray[i])) return sortedArray[i];
        i++;
      }
    } else if (verticalState == "Bottom") {
      var i = sortedArray.length - 1;
      while (
        i >= 0 &&
        sortedArray[i].endY >= canvasMidPoint &&
        sortedArray[i].y <= this.endY
      ) {
        if (this.collidesWith(sortedArray[i])) return sortedArray[i];
        i--;
      }
    }
    return false;
  }
}
