import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HeaderComponent } from './MyComponent/header/header.component';
import { IntroComponent } from './MyComponent/home/intro/intro.component';
import { AppComponent } from './app.component';
import { HomeComponent } from './MyComponent/home/home.component';
import { AboutUsComponent } from './MyComponent/about-us/about-us.component';
import { ServicesComponent } from './MyComponent/services/services.component';
import { PlanComponent } from './MyComponent/plan/plan.component';
import { ContactUsComponent } from './MyComponent/contact-us/contact-us.component';
import { ImageTourComponent } from './MyComponent/image-tour/image-tour.component';
import { VideoTourComponent } from './MyComponent/video-tour/video-tour.component';

const routes: Routes = [
  
  { path: '', component: HomeComponent },
  { path: 'home', component: HomeComponent },
  { path: 'plan', component: PlanComponent },
  { path: 'services', component: ServicesComponent },
  { path: 'contact', component: ContactUsComponent},
  { path: 'images', component: ImageTourComponent},
  { path: 'videos', component: VideoTourComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
