import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BrowserModule } from '@angular/platform-browser';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { MenuComponent } from './views/menu/menu.component';
import { PlatoComponent } from './views/plato/plato.component';
import { HomeComponent } from './views/home/home.component';
import { HttpClientModule } from '@angular/common/http';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { FormPlatoComponent } from './views/form-plato/form-plato.component';
import { FormMenuComponent } from './views/form-menu/form-menu.component';
import { AddPlatoComponent } from './views/add-plato/add-plato.component';
import { AddMenuComponent } from './views/add-menu/add-menu.component';

@NgModule({

  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    MenuComponent,
    PlatoComponent,
    HomeComponent,
    FormPlatoComponent,
    FormMenuComponent,
    AddPlatoComponent,
    AddMenuComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}
