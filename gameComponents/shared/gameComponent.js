class GameComponent {
  constructor(position, width, height, imageUrl, clamp_to_screen = true) {
    this.body = new Body(position, width, height, clamp_to_screen);
    this.sprite = new Image();
    this.sprite.src = imageUrl;
  }

  moveTo(x, y, screen) {
    this.body.update_position(x, y, screen);
  }

  collidesWith(other_object) {
    let other_body = other_object.body;
    if (this.body.isOverlappingVertical(other_body) && this.body.isOverlappingHorizontal(other_body))
      return true;

    return false;
  }

  hasCollsionWith(sorted_array, canvas_mid_point) {
    let {i, increment} = GameComponent.setLoopVariables((this.body.top() < canvas_mid_point), sorted_array.length - 1)
    while(i >= 0 && i < sorted_array.length){
      if(sorted_array[i].body.top() <= this.body.bottom() && this.collidesWith(sorted_array[i]))
        return sorted_array[i];
      i += increment;
    }
    return false;
  }

  static setLoopVariables(is_top_of_screen, last_index){
    return is_top_of_screen ? { i: 0, increment: 1 } : { i: last_index, increment: -1 };
  }

}
