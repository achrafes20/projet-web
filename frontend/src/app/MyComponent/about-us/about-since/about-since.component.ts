import { Component, ElementRef } from '@angular/core';

@Component({
  selector: 'app-about-since',
  templateUrl: './about-since.component.html',
  styleUrls: ['./about-since.component.css']
})
export class AboutSinceComponent {
    // imgUrl="https://images.unsplash.com/photo-1570829460005-c840387bb1ca?auto=format&fit=crop&q=80&w=3132&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
    videoUrl="../assets/groundfloor.mp4"
    constructor(private elementRef:ElementRef) { }
    ngAfterViewInit() {
      const video = this.elementRef.nativeElement.querySelector('#myVideo');
  
      if (video) {
        // Mute the video
        video.muted = true;
    }
    }
}
