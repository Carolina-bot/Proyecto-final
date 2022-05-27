import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HomeComponent } from './views/home/home.component';
import { MenuComponent } from './views/menu/menu.component';
import { PlatoComponent } from './views/plato/plato.component';
import { AddMenuComponent } from './views/add-menu/add-menu.component';
import { AddPlatoComponent } from './views/add-plato/add-plato.component';
import { FormMenuComponent } from './views/form-menu/form-menu.component';
import { FormPlatoComponent } from './views/form-plato/form-plato.component';

const routes: Routes = [
  { path: '', redirectTo: 'menu', pathMatch: 'full' },
  { path: 'home', component: HomeComponent },
  { path: 'menu', component: MenuComponent },
  { path: 'plato', component: PlatoComponent },
  { path: 'form-menu', component: FormMenuComponent },
  { path: 'form-plato', component: FormPlatoComponent },
  { path: 'add-menu', component: AddMenuComponent },
  { path: 'add-plato', component: AddPlatoComponent }
  ];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
