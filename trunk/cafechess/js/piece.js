//--------------------------------------------------------------------
//LỚP PIECE biểu diễn QUÂN CỜ
//--------------------------------------------------------------------
//Name: tên quân cờ {King, Rook, Bishop, Elephant, Canon, Horse, Pawn}
//Type: màu quân cờ {R, G} tương đương với {Đỏ, Xanh}
//X, Y: vị trí quân cờ, vị trí ảo chưa tính tọa độ thực tế.
function Piece(name, type, x, y){
	this.Name 	= name;     
	this.Type 	= type;
	this.X		= x;
	this.Y		= y;
	this.getX	= function(){return this.X;}
	this.getY	= function(){return this.Y;}
	this.setXY	= function(X, Y){this.X = X; this.Y = Y;}	
	
	this.getFileName	= function(){return "image/"+this.Type+this.Name+".gif";}
	this.draw = function(canvas, context) {
		loadPiece(canvas, context, this.X, this.Y, this.Type, this.Name);
	}
}