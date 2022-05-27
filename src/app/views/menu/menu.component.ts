import { Component, OnInit } from '@angular/core';
import { DataService } from '../../sevices/data.service';
import { Menu } from '../../models/menu/menu.interface';
import { FormBuilder, FormGroup } from '@angular/forms';
import { MenuService } from '../../sevices/menu/menu.service';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {

  constructor(public servicio: DataService, private formBuilder: FormBuilder, private servicioMenu: MenuService) {
    this.form = this.createForm();
  }

  public menus: Menu[] = [];

  public detalleMenu: Menu | undefined;

  public form: FormGroup;

  public createForm() {
    return this.formBuilder.group({
      id: [''],
      Fecha: [''],
      Plato1: [''],
      Plato2: [''],
      Plato3: [''],
      Plato4: [''],
      Plato5: [''],
      Plato6: ['']
    });
  }

  ngOnInit(): void {
    this.getMenus();
  }

  public getMenus() {
    this.servicio.getMenus().subscribe((response) => {
      this.menus = response;
    });
  }

  public onModificar(menuId: number) {
    this.servicio.getMenuId(menuId).subscribe((response) => {
      console.log(response);
      this.servicioMenu.disparador.emit({
        data: response
      })
    });
  }

  public onDelete(menuId: number): void{
    this.servicio.deleteMenu(menuId).subscribe();
    window.location.reload();
  }

}
