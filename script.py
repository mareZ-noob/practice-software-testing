import csv
import random

# --- Configuration ---

# 1. Your list of accounts
accounts = [
    {'email': 'customer@practicesoftwaretesting.com', 'password': 'welcome01'},
    {'email': 'customer2@practicesoftwaretesting.com', 'password': 'welcome01'},
]

# 2. The name of the input CSV file.
#    Make sure you have a file with this name in the same directory as the script.
input_filename = 'mock3.csv'

# 3. The name of the output file you want to create
output_filename = 'data3.csv'

# --- Script Logic ---

def add_accounts_to_csv(input_file_path, account_list, output_file_path):
    """
    Reads CSV data from a file, adds random account info, and writes to a new file.

    Args:
        input_file_path (str): The path to the source CSV file.
        account_list (list): A list of dictionaries, where each dictionary is an account.
        output_file_path (str): The path for the new CSV file.
    """
    try:
        with open(input_file_path, 'r', newline='', encoding='utf-8') as input_file:
            # Prepare to read the CSV
            csv_reader = csv.reader(input_file)

            # Read the header row
            header = next(csv_reader)
            # Add the new column names to the header
            new_header = header + ['email', 'password']

            # Prepare the list that will hold all our new rows
            output_rows = [new_header]

            print("Processing rows from file...")
            # Process each row from the input file
            for row in csv_reader:
                # Randomly choose one account from the list
                random_account = random.choice(account_list)

                # Create the new row by combining the original row with the account info
                new_row = row + [random_account['email'], random_account['password']]
                output_rows.append(new_row)
                print(f"  -> Added account '{random_account['email']}' to a row.")

    except FileNotFoundError:
        print(f"\nError: The file '{input_file_path}' was not found.")
        print("Please make sure the input file exists in the same directory as the script.")
        return
    except Exception as e:
        print(f"\nAn unexpected error occurred while reading the input file: {e}")
        return

    # Write the new data to the output CSV file
    try:
        with open(output_file_path, 'w', newline='', encoding='utf-8') as f:
            writer = csv.writer(f)
            writer.writerows(output_rows)
        print(f"\nSuccessfully created '{output_file_path}' with updated data.")
    except IOError as e:
        print(f"\nError writing to file: {e}")


# --- Run the script ---
if __name__ == "__main__":
    add_accounts_to_csv(input_filename, accounts, output_filename)