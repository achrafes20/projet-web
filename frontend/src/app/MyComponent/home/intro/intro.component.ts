import { Component, ElementRef } from '@angular/core';
import { gsap } from 'gsap';

@Component({
  selector: 'app-intro',
  templateUrl: './intro.component.html',
  styleUrls: ['./intro.component.css']
})
export class IntroComponent {
  videoUrl = '../assets/gymbgg.mp4'

  constructor(private elementRef: ElementRef) { }

  ngAfterViewInit() {
    const element = this.elementRef.nativeElement.querySelector('.my-element');

    gsap.to(element, { x: 20, duration: 4, ease:"3" });
  }

}
