import { Component, OnInit } from '@angular/core';
import { MenuService } from '../../sevices/menu/menu.service';
import { FormBuilder, FormGroup } from '@angular/forms';
import { DataService } from '../../sevices/data.service';
import { Menu } from '../../models/menu/menu.interface';

@Component({
  selector: 'app-add-menu',
  templateUrl: './add-menu.component.html',
  styleUrls: ['./add-menu.component.css']
})
export class AddMenuComponent implements OnInit {

  constructor(public servicio: DataService, private formBuilder: FormBuilder, private servicioMenu: MenuService) {
    this.form = this.createForm();
  }

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

  public menus: Array<any> = [];

  ngOnInit(): void {
    this.servicioMenu.disparador.subscribe((data) => {
      this.menus = [];
      this.menus.push(data);
    });
  }

  public add(){
    console.log(this.form.value);
    const datos = { ...this.detalleMenu, ...this.form.value };
    this.servicio.addMenu(datos).subscribe(response => {
      this.detalleMenu = { ...this.detalleMenu, ...this.form.value };
      });
  }

}
