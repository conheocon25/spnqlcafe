//--------------------------------------------------------------------
//LỚP PIECE biểu diễn QUÂN CỜ
//--------------------------------------------------------------------
//Name: tên quân cờ {King, Rook, Bishop, Elephant, Canon, Horse, Pawn}
//Type: màu quân cờ {R, G} tương đương với {Đỏ, Xanh}
//X, Y: vị trí quân cờ, vị trí ảo chưa tính tọa độ thực tế.
function Piece(Name, Type, X, Y){
	this.isLived	= true;
	this.Name 		= Name;
	this.Type 		= Type;
	this.X			= X;
	this.Y			= Y;
	this.Image		= new Image();	
	this.Image.src 	= "image/"+this.Type+ this.Name+".gif";
	
	//THIẾT LẬP TỌA ĐỘ
	this.getX	= function(){return this.X;}
	this.getY	= function(){return this.Y;}
	this.setXY	= function(X, Y){this.X = X; this.Y = Y;}
	
	//THIẾT LẬP VẼ
	this.getImage 		= function(){return this.Image;}
	this.getFileName	= function(){return "image/"+this.Type+this.Name+".gif";}
	
	//KIỂM TRA NƯỚC ĐI HỢP LỆ
	
}