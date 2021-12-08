import { Controller } from 'stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {

  static targets = [ "answer" ]

  connect(){
     this.originHeight = this.answerTarget.ownerDocument.defaultView.getComputedStyle(this.answerTarget, null)['height'];
     this.answerTarget.style.height = '0px';
  }
  process() {
    this.answerTarget.style.transition = 'height 1s';
    const { height } = this.answerTarget.ownerDocument.defaultView.getComputedStyle(this.answerTarget, null);
    if (parseInt(height, 10) === 0) {
      this.answerTarget.style.height = this.originHeight;
    } else {
     this.answerTarget.style.height = '0px';
    }
  }

}

