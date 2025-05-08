import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AboutSinceComponent } from './about-since.component';

describe('AboutSinceComponent', () => {
  let component: AboutSinceComponent;
  let fixture: ComponentFixture<AboutSinceComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [AboutSinceComponent]
    });
    fixture = TestBed.createComponent(AboutSinceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
