import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './MyComponent/header/header.component';
import { IntroComponent } from './MyComponent/home/intro/intro.component';
import { HomeComponent } from './MyComponent/home/home.component';
import { AboutUsComponent } from './MyComponent/about-us/about-us.component';
import { DropdownComponent } from './MyComponent/header/dropdown/dropdown.component';
import { PlanComponent } from './MyComponent/plan/plan.component';
import { AboutComponent } from './MyComponent/about-us/about/about.component';
import { AboutSinceComponent } from './MyComponent/about-us/about-since/about-since.component';
import { AboutInfoComponent } from './MyComponent/about-us/about-info/about-info.component';
import { ServicesComponent } from './MyComponent/services/services.component';
import { PTrainComponent } from './MyComponent/services/p-train/p-train.component';
import { PNutriComponent } from './MyComponent/services/p-nutri/p-nutri.component';
import { PEquiComponent } from './MyComponent/services/p-equi/p-equi.component';
import { GymLocComponent } from './MyComponent/home/gym-loc/gym-loc.component';
import { OneComponent } from './MyComponent/plan/one/one.component';
import { TwoComponent } from './MyComponent/plan/two/two.component';
import { ThreeComponent } from './MyComponent/plan/three/three.component';
import { FourComponent } from './MyComponent/plan/four/four.component';
import { HeadingComponent } from './MyComponent/plan/heading/heading.component';
import { PHeadComponent } from './MyComponent/services/p-head/p-head.component';
import { ContactUsComponent } from './MyComponent/contact-us/contact-us.component';
import { ContactComponent } from './MyComponent/contact-us/contact/contact.component';
import { ContactFormComponent } from './MyComponent/contact-us/contact/contact-form/contact-form.component';
import { MatSnackBarModule } from '@angular/material/snack-bar';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ToastrModule } from 'ngx-toastr';
import { ImageTourComponent } from './MyComponent/image-tour/image-tour.component';
import { VideoTourComponent } from './MyComponent/video-tour/video-tour.component';


@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    IntroComponent,
    HomeComponent,
    AboutUsComponent,
    DropdownComponent,
    PlanComponent,
    AboutComponent,
    AboutSinceComponent,
    AboutInfoComponent,
    ServicesComponent,
    PTrainComponent,
    PNutriComponent,
    PEquiComponent,
    GymLocComponent,
    OneComponent,
    TwoComponent,
    ThreeComponent,
    FourComponent,
    HeadingComponent,
    PHeadComponent,
    ContactUsComponent,
    ContactComponent,
    ContactFormComponent,
    ImageTourComponent,
    VideoTourComponent
  ],
  imports: [
    BrowserModule,
    ReactiveFormsModule,
    AppRoutingModule,
    FormsModule,
    BrowserAnimationsModule,
    MatSnackBarModule,
    ToastrModule.forRoot({
      timeOut: 3000, // Set the timeout for the toast
      positionClass: 'toast-top-center', // Set the position to top-center
      preventDuplicates: true, // Prevent showing duplicate toasts
    })
    
    
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
