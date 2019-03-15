 import { Component } from '@angular/core';
 import {Post} from "./post";
 import {MatDialog} from "@angular/material";
 import {PostDialogComponent} from "./post-dialog/post-dialog.component";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'meuapp';
  private posts: Post[] = [
      new Post("Joao", "meu post", "sub joao", "joao@gmail.com", "Minha msg"),
      new Post("Joao2", "meu post2", "sub joao2", "joao@gmail.com2", "Minha msg2"),
      new Post("Joao3", "meu post2", "sub joao2", "joao@gmail.com2", "Minha msg2"),
      new Post("Joao3", "meu post2", "sub joao2", "joao@gmail.com2", "Minha msg2"),
      new Post("Joao3", "meu post2", "sub joao2", "joao@gmail.com2", "Minha msg2"),
  ];

  constructor(
      public dialog: MatDialog
  ){}

  openDialog(){
      const dialogRef = this.dialog.open(PostDialogComponent,{
          width:'600px'})
      dialogRef.afterClosed().subscribe(
          (result) => {
              if(result){
                  console.log(result);
              }
          }
      );
  }
}
