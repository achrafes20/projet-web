import { Component, ElementRef,AfterViewInit } from '@angular/core';

@Component({
  selector: 'app-video-tour',
  templateUrl: './video-tour.component.html',
  styleUrls: ['./video-tour.component.css']
})
export class VideoTourComponent {
  videoUrl="../assets/groundfloor.mp4"
  videoUrl2="../assets/firstfloor.mp4"
  videoUrl3="../assets/secondfloor.mp4"
  constructor(private elementRef: ElementRef) { }

  ngAfterViewInit() {
    const videoElements = this.elementRef.nativeElement.querySelectorAll('.myVideo');

    videoElements.forEach((video: HTMLVideoElement) => {
      if (video) {
        // Mute each video
        video.muted = true;
      }
    });
  }
}
