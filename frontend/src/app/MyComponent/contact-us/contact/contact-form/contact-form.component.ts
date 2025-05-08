import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import emailjs, { EmailJSResponseStatus } from 'emailjs-com';
import { environment } from './contact';  // Import environment

@Component({
  selector: 'app-contact-form',
  templateUrl: './contact-form.component.html',
  styleUrls: ['./contact-form.component.css']
})
export class ContactFormComponent implements OnInit {
  contactForm!: FormGroup;
  showDiv: boolean = false;

  constructor(private formBuilder: FormBuilder) { }

  ngOnInit() {
    this.contactForm = this.formBuilder.group({
      firstName: ['', [Validators.required, Validators.pattern('[a-zA-Z ]*'), Validators.minLength(3)]],
      lastName: ['', [Validators.required, Validators.pattern('[a-zA-Z ]*'), Validators.minLength(3)]],
      phone: ['', [Validators.required, Validators.minLength(10)]],
      email: ['', [Validators.required, Validators.email, Validators.minLength(10)]],
      query: ['', [Validators.required, Validators.minLength(6)]],
    });
  }

  async onSubmit() {
    await emailjs.send(
      environment.emailinfo.serviceId,
      environment.emailinfo.templateId,
      {
        from_name: this.contactForm.value.firstName,
        to_name: environment.emailinfo.name,
        from_email: this.contactForm.value.email,
        to_email: environment.emailinfo.email,
        message: this.contactForm.value.query,
      },
      environment.emailinfo.apiKey
    );

    this.showDiv = true;
    setTimeout(() => {
      this.contactForm.reset();
      this.showDiv = false;
    }, 2000);
  }

  resetForm() {
    this.contactForm.reset();
  }
}
