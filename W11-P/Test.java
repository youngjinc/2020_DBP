package DB;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class Test {


private static String className = "oracle.jdbc.driver.OracleDriver";
private static String url = "jdbc:oracle:thin:@localhost:1521:xe";
private static String user = "hr";
private static String password = "1234";

	public Connection getConnection() {
		Connection conn = null;
		
		try {
			Class.forName(className);
			conn = DriverManager.getConnection(url, user, password);
			System.out.println("connection success");
		}catch(ClassNotFoundException cnfe) {
			System.out.println("failed db driver loading\n" + cnfe.toString());
		} catch(SQLException sqle) {
			System.out.println("failed db connection\n" + sqle.toString());
		}catch(Exception e) {
			System.out.println("Unknown error");
			e.printStackTrace();
		}
		
		return conn;
	}

	
	public void closeAll(Connection conn, PreparedStatement psmt, ResultSet rs) {
		try {
			if(rs != null) rs.close();
			if(psmt != null) psmt.close();
			if(conn != null) conn.close();
			System.out.println("All closed");
		}catch(SQLException sqle) {
			System.out.println("Error!!");
			sqle.printStackTrace();
		}
	}
	
	private void select() {
		Connection conn = null;
		PreparedStatement psmt = null;
		ResultSet rs = null;
		String sql = "select * from (select * from departments order by rownum desc) where rownum = 1";
		
		// 오라클에 쿼리 전송 및 결과값 반환
		try {
			conn = this.getConnection();
			psmt = conn.prepareStatement(sql); //정보 보내기 -> 연결
			rs = psmt.executeQuery(); //executeQuery: 쿼리동작시키는 메서드, rs객체
			while(rs.next()) {
				System.out.print("department_id: " + rs.getString("department_id"));
				System.out.print("\tdepartment_name: " + rs.getString("department_name"));
				System.out.println("\t\tlocation_id: " + rs.getString("location_id"));
			}			
		} catch(SQLException e) {
			e.printStackTrace();
		} finally {
			this.closeAll(conn, psmt, rs);
		}
	}

	private void update() {
		Connection conn = null;
		PreparedStatement psmt = null;
		String sql = "update departments set location_id = 2500 where department_id = 280";
		
		try {
			conn = this.getConnection();
			psmt = conn.prepareStatement(sql); 
			int count = psmt.executeUpdate(); 
			System.out.println(count + " row updated");
		} catch(SQLException e) {
			e.printStackTrace();
		}finally {
			this.closeAll(conn, psmt, null);
		}
	}
	
	private void insert() {
		Connection conn = null;
		PreparedStatement psmt = null;
		String sql = "insert into departments values (280, 'DESIGN', 200, 1700)";	
		
		try {
			conn = this.getConnection();
			psmt = conn.prepareStatement(sql); 
			int count = psmt.executeUpdate(); 
			System.out.println(count + " row inserted");
		} catch(SQLException e) {
			e.printStackTrace();
		}finally {
			this.closeAll(conn, psmt, null);
		}
	}
	
	private void delete() {
		Connection conn = null;
		PreparedStatement psmt = null;
		String sql = "delete from departments where department_id = 280";
		
		try {
			conn = this.getConnection();
			psmt = conn.prepareStatement(sql); 
			int count = psmt.executeUpdate(); 
			System.out.println(count + " row deleted");
		} catch(SQLException e) {
			e.printStackTrace();
		}finally {
			this.closeAll(conn, psmt, null);
		}
	}
	
	public static void main(String[] args) {		
		Test so = new Test();
		so.select();
		so.insert();
		so.select();
		so.update();
		so.select();
		so.delete();
		so.select();
	}

}
